<?php
/**
 * contact.php — Kolya audit form handler
 *
 * Posts from index.html#contact (or metiers/<slug>/#audit), validates
 * server-side, sends one email to the agency mailbox via PHP mail(),
 * then redirects with ?sent=1 (success) or ?sent=0&error=... (failure).
 *
 * Hostinger note: PHP mail() works only when the From address uses a
 * domain hosted on the same Hostinger account AND the mailbox actually
 * exists in the Hostinger Email panel. SPF/DKIM are auto-configured.
 *
 * --- Configuration -------------------------------------------------- */

declare(strict_types=1);

$CONFIG = [
    // Primary inbox. MUST be a REAL mailbox in Hostinger Email panel.
    'to'         => 'contact@kolya.fr',

    // Backup inbox for diagnostic. Set to a Gmail / Outlook / personal
    // address. If you receive here but NOT on `to`, the problem is
    // specifically with the contact@kolya.fr mailbox (doesn't exist,
    // DNS issue, or spam filter on that mailbox). Empty = disabled.
    'to_backup'  => 'p.lazno@gmail.com',

    // From address. Uses the SAME address as `to` so only ONE mailbox
    // is needed in Hostinger. Visitor's email is in Reply-To.
    'from'       => 'contact@kolya.fr',
    'from_name'  => 'Kolya · Site',

    'subject'    => 'Audit Kolya · Demande de ',
    'redirect'   => 'index.html',

    'max_field'  => 200,
    'max_msg'    => 5000,

    // Log every attempt to this file (.htaccess blocks public access).
    'log_path'   => __DIR__ . '/contact.log',
];

/* --- Helpers --------------------------------------------------------- */

function logAttempt(string $logPath, string $line): void
{
    if ($logPath === '') return;
    @file_put_contents(
        $logPath,
        '[' . date('Y-m-d H:i:s P') . '] ' . $line . "\n",
        FILE_APPEND | LOCK_EX
    );
}

function fail(array $codes, string $redirect, string $logPath, string $detail = ''): void
{
    logAttempt($logPath, 'FAIL ' . implode(',', $codes) . ($detail ? ' :: ' . $detail : ''));
    $qs = http_build_query(['sent' => 0, 'error' => implode(',', $codes)]);
    // No fragment: JS handles scroll to the right element after layout settles
    header('Location: ' . $redirect . '?' . $qs);
    exit;
}

function ok(string $redirect, string $logPath, string $email): void
{
    logAttempt($logPath, 'OK ' . $email);
    // No fragment: JS handles scroll to the right element after layout settles
    header('Location: ' . $redirect . '?sent=1');
    exit;
}

/**
 * Decide where to redirect: prefer the page the form was posted from
 * (HTTP Referer), fall back to the configured default. This way users
 * who submit from /metiers/garage/ land back on /metiers/garage/, not home.
 */
function pickRedirect(string $default): string
{
    $ref = $_SERVER['HTTP_REFERER'] ?? '';
    if ($ref === '') return $default;
    $parts = parse_url($ref);
    $hostOk = ($parts['host'] ?? '') === ($_SERVER['HTTP_HOST'] ?? '');
    if (!$hostOk) return $default;
    $path = $parts['path'] ?? '';
    if ($path === '' || $path === '/') return $default;
    return $path;
}

function clean(string $v, int $max): string
{
    $v = trim($v);
    $v = str_replace(["\r", "\n", "\0"], '', $v);
    if (mb_strlen($v) > $max) {
        $v = mb_substr($v, 0, $max);
    }
    return $v;
}

/* --- Method gate ----------------------------------------------------- */

// Compute redirect target once, used everywhere
$redirect = pickRedirect($CONFIG['redirect']);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . $redirect);
    exit;
}

/* --- Honeypot (anti-bot) -------------------------------------------- */

if (!empty($_POST['website'] ?? '')) {
    logAttempt($CONFIG['log_path'], 'BOT honeypot triggered, silently dropped');
    ok($redirect, '', '');
}

/* --- Read + clean inputs -------------------------------------------- */

$name    = clean($_POST['name']    ?? '', $CONFIG['max_field']);
$company = clean($_POST['company'] ?? '', $CONFIG['max_field']);
$email   = clean($_POST['email']   ?? '', $CONFIG['max_field']);
$phone   = clean($_POST['phone']   ?? '', $CONFIG['max_field']);
$sector  = clean($_POST['sector']  ?? '', 64);
$message = clean($_POST['message'] ?? '', $CONFIG['max_msg']);

/* --- Validate -------------------------------------------------------- */

$errors = [];
if ($name === '')                                      $errors[] = 'name';
if (!filter_var($email, FILTER_VALIDATE_EMAIL))        $errors[] = 'email';
if ($message === '')                                   $errors[] = 'message';

if ($errors) {
    fail($errors, $redirect, $CONFIG['log_path']);
}

/* --- Build the email ------------------------------------------------- */

// All sector slugs sent by the site (home dropdown removed; metier pages
// send hidden field with the metier slug).
$sectorLabels = [
    // Home (legacy / fallback if dropdown re-enabled)
    'marches'          => 'Marchés, commerce de proximité',
    'sport'            => 'Salles de sport, fitness',
    'artisans'         => 'Artisans, BTP',
    'restaurants'      => 'Restauration, hôtellerie',
    'services'         => 'Services aux entreprises',
    'autre'            => 'Autre',
    // Métier pages (hidden field)
    'garage'           => 'Garage / atelier automobile',
    'salles-de-sport'  => 'Salle de sport / fitness',
    'institut-beaute'  => 'Institut de beauté',
    'demenageur'       => 'Déménagement',
    'pharmacie'        => 'Pharmacie',
    'boulangerie'      => 'Boulangerie',
    'coach-sportif'    => 'Coach sportif',
    'kinesitherapeute' => 'Cabinet de kinésithérapie',
    'auto-ecole'       => 'Auto-école',
    'climatisation'    => 'Climatisation / froid commercial',
    'electricien'      => 'Électricien',
    'geometre'         => 'Géomètre-expert',
    'elevage-canin'    => 'Élevage canin',
    'sav'              => 'Service après-vente',
    'finance'          => 'Pilotage financier',
    'commercial'       => 'Équipe commerciale',
    'relation-client'  => 'Relation client / fidélisation',
];
$sectorLabel = $sectorLabels[$sector] ?? ($sector !== '' ? ucfirst($sector) : '');

$subject = $CONFIG['subject'] . $name;

$body = "Nouvelle demande d'audit gratuit depuis kolya.fr\n\n";
$body .= "Nom        : $name\n";
if ($company !== '') $body .= "Entreprise : $company\n";
$body .= "Email      : $email\n";
if ($phone !== '')   $body .= "Téléphone  : $phone\n";
if ($sectorLabel)    $body .= "Source     : $sectorLabel" . ($sector ? " ($sector)" : "") . "\n";
$body .= "\n";
$body .= "Message :\n";
$body .= "----------------------------------------\n";
$body .= $message . "\n";
$body .= "----------------------------------------\n\n";
$body .= "Reçu le " . date('Y-m-d H:i:s') . " (UTC " . date('P') . ")\n";
if (!empty($_SERVER['REMOTE_ADDR'])) {
    $body .= "IP visiteur : " . $_SERVER['REMOTE_ADDR'] . "\n";
}
if (!empty($_SERVER['HTTP_REFERER'])) {
    $body .= "Page source : " . $_SERVER['HTTP_REFERER'] . "\n";
}

/* --- Headers --------------------------------------------------------- */

$fromName = $CONFIG['from_name'];
$fromAddr = $CONFIG['from'];
$host     = $_SERVER['HTTP_HOST'] ?? 'kolya.fr';
$msgId    = '<' . bin2hex(random_bytes(8)) . '.' . time() . '@' . $host . '>';

$headers   = [];
$headers[] = "From: =?UTF-8?B?" . base64_encode($fromName) . "?= <$fromAddr>";
$headers[] = "Reply-To: $email";
$headers[] = "Return-Path: $fromAddr";
$headers[] = "Message-ID: $msgId";
$headers[] = "Date: " . date('r');
$headers[] = "Content-Type: text/plain; charset=UTF-8";
$headers[] = "Content-Transfer-Encoding: 8bit";
$headers[] = "MIME-Version: 1.0";
$headers[] = "X-Mailer: Kolya/1.1";

$encodedSubject = "=?UTF-8?B?" . base64_encode($subject) . "?=";

/* --- Send ------------------------------------------------------------ */

$headerStr = implode("\r\n", $headers);

// Primary send to the configured inbox
$sent = @mail($CONFIG['to'], $encodedSubject, $body, $headerStr, '-f' . $fromAddr);
logAttempt($CONFIG['log_path'], 'PRIMARY ' . ($sent ? 'returned-true' : 'returned-false') . ' to=' . $CONFIG['to'] . ' from=' . $fromAddr);

// Backup send to a personal address for diagnostic (only if configured)
if (!empty($CONFIG['to_backup'])) {
    $sentBackup = @mail($CONFIG['to_backup'], $encodedSubject, $body, $headerStr, '-f' . $fromAddr);
    logAttempt($CONFIG['log_path'], 'BACKUP  ' . ($sentBackup ? 'returned-true' : 'returned-false') . ' to=' . $CONFIG['to_backup']);
}

if (!$sent) {
    $err = error_get_last();
    $detail = $err['message'] ?? 'mail() returned false';
    fail(['mail'], $redirect, $CONFIG['log_path'], "to={$CONFIG['to']} from=$fromAddr :: $detail");
}

ok($redirect, $CONFIG['log_path'], $email);
