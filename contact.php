<?php
/**
 * contact.php — Kolya audit form handler
 *
 * Posts from index.html#contact, validates server-side, sends one email
 * to the agency mailbox via PHP mail(), then redirects back to the page
 * with ?sent=1 (success) or ?sent=0&error=... (failure).
 *
 * Designed for Hostinger shared hosting. PHP mail() works out of the box
 * on Hostinger plans when the From address uses a domain hosted on the
 * same account (DKIM/SPF set up automatically).
 *
 * --- Configuration -------------------------------------------------- */

declare(strict_types=1);

$CONFIG = [
    // Where the form's content lands (your inbox).
    // Use a real address on a domain you control on Hostinger.
    'to'         => 'bonjour@kolya.ai',

    // From address. MUST be on a domain hosted on this Hostinger account
    // for the mail to pass SPF/DKIM. Anything else gets flagged as spam.
    'from'       => 'noreply@kolya.ai',
    'from_name'  => 'Kolya · Site',

    // Subject prefix.
    'subject'    => 'Audit Kolya · Demande de ',

    // Where to redirect on success / failure. Relative URLs OK.
    'redirect'   => 'index.html',

    // Max payload sizes (defensive).
    'max_field'  => 200,
    'max_msg'    => 5000,
];

/* --- Helpers --------------------------------------------------------- */

function fail(array $codes, string $redirect): void
{
    $qs = http_build_query(['sent' => 0, 'error' => implode(',', $codes)]);
    header('Location: ' . $redirect . '?' . $qs . '#contact');
    exit;
}

function ok(string $redirect): void
{
    header('Location: ' . $redirect . '?sent=1#contact');
    exit;
}

function clean(string $v, int $max): string
{
    $v = trim($v);
    // Strip all CR/LF to prevent header injection.
    $v = str_replace(["\r", "\n", "\0"], '', $v);
    if (mb_strlen($v) > $max) {
        $v = mb_substr($v, 0, $max);
    }
    return $v;
}

/* --- Method gate ----------------------------------------------------- */

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . $CONFIG['redirect'] . '#contact');
    exit;
}

/* --- Honeypot (anti-bot) -------------------------------------------- */
/* The form has a hidden <input name="website">. Real users can't fill it.
 * Bots scraping the form often fill every field. If filled, we silently
 * accept the submission (return success) so the bot thinks it worked,
 * but we never deliver. */

if (!empty($_POST['website'] ?? '')) {
    ok($CONFIG['redirect']);
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
    fail($errors, $CONFIG['redirect']);
}

/* --- Build the email ------------------------------------------------- */

$sectorLabels = [
    'marches'     => 'Marchés, commerce de proximité',
    'sport'       => 'Salles de sport, fitness',
    'artisans'    => 'Artisans, BTP',
    'restaurants' => 'Restauration, hôtellerie',
    'services'    => 'Services aux entreprises',
    'autre'       => 'Autre',
];
$sectorLabel = $sectorLabels[$sector] ?? '';

$subject = $CONFIG['subject'] . $name;

$body = "Nouvelle demande d'audit gratuit depuis kolya.ai\n\n";
$body .= "Nom        : $name\n";
if ($company !== '') $body .= "Entreprise : $company\n";
$body .= "Email      : $email\n";
if ($phone !== '')   $body .= "Téléphone  : $phone\n";
if ($sectorLabel)    $body .= "Secteur    : $sectorLabel\n";
$body .= "\n";
$body .= "Message :\n";
$body .= "----------------------------------------\n";
$body .= $message . "\n";
$body .= "----------------------------------------\n\n";
$body .= "Reçu le " . date('Y-m-d H:i:s') . " (UTC " . date('P') . ")\n";
if (!empty($_SERVER['REMOTE_ADDR'])) {
    $body .= "IP visiteur : " . $_SERVER['REMOTE_ADDR'] . "\n";
}

/* --- Headers --------------------------------------------------------- */

$fromName = $CONFIG['from_name'];
$fromAddr = $CONFIG['from'];

$headers   = [];
$headers[] = "From: =?UTF-8?B?" . base64_encode($fromName) . "?= <$fromAddr>";
$headers[] = "Reply-To: $email";
$headers[] = "Return-Path: $fromAddr";
$headers[] = "Content-Type: text/plain; charset=UTF-8";
$headers[] = "MIME-Version: 1.0";
$headers[] = "X-Mailer: Kolya/1.0";

$encodedSubject = "=?UTF-8?B?" . base64_encode($subject) . "?=";

/* --- Send ------------------------------------------------------------ */

$sent = @mail(
    $CONFIG['to'],
    $encodedSubject,
    $body,
    implode("\r\n", $headers),
    '-f' . $fromAddr
);

if (!$sent) {
    fail(['mail'], $CONFIG['redirect']);
}

ok($CONFIG['redirect']);
