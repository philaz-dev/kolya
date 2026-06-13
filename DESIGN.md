---
name: Kolya
description: Agence d'implémentation IA pour TPE-PME. Des solutions simples, des résultats concrets.
colors:
  citron-net: "#C5F548"
  citron-net-deep: "#1F2D0A"
  encre-carbone: "#0E0E0C"
  encre-carbone-lift: "#1A1A18"
  papier: "#FFFFFF"
  creme-atelier: "#F5F4EF"
  creme-atelier-deep: "#ECEAE2"
  gris-tirage: "#6B6B66"
  hairline: "#0E0E0C14"
  hairline-soft: "#0E0E0C0D"
typography:
  display:
    fontFamily: "Fraunces, serif"
    fontSize: "clamp(56px, 10vw, 168px)"
    fontWeight: 400
    lineHeight: 0.92
    letterSpacing: "-0.04em"
    fontVariation: "'opsz' 144"
  headline:
    fontFamily: "Fraunces, serif"
    fontSize: "clamp(44px, 6vw, 96px)"
    fontWeight: 400
    lineHeight: 0.94
    letterSpacing: "-0.04em"
    fontVariation: "'opsz' 144"
  title:
    fontFamily: "Fraunces, serif"
    fontSize: "clamp(22px, 2.4vw, 36px)"
    fontWeight: 400
    lineHeight: 1.1
    letterSpacing: "-0.025em"
  body:
    fontFamily: "Plus Jakarta Sans, system-ui, sans-serif"
    fontSize: "16px"
    fontWeight: 400
    lineHeight: 1.55
  lede:
    fontFamily: "Plus Jakarta Sans, system-ui, sans-serif"
    fontSize: "clamp(18px, 1.4vw, 21px)"
    fontWeight: 400
    lineHeight: 1.5
  label:
    fontFamily: "JetBrains Mono, monospace"
    fontSize: "11px"
    fontWeight: 500
    lineHeight: 1
    letterSpacing: "0.22em"
rounded:
  pill: "999px"
  core-tight: "22px"
  core: "26px"
  shell-tight: "28px"
  shell: "32px"
  section: "48px"
spacing:
  xs: "6px"
  sm: "12px"
  md: "16px"
  lg: "24px"
  xl: "32px"
  2xl: "64px"
  3xl: "80px"
  section: "160px"
components:
  button-primary:
    backgroundColor: "{colors.citron-net}"
    textColor: "{colors.encre-carbone}"
    rounded: "{rounded.pill}"
    padding: "6px 6px 6px 22px"
  button-primary-hover:
    backgroundColor: "#D2FA60"
  button-dark:
    backgroundColor: "{colors.encre-carbone}"
    textColor: "{colors.papier}"
    rounded: "{rounded.pill}"
    padding: "6px 6px 6px 22px"
  button-dark-hover:
    backgroundColor: "{colors.citron-net}"
    textColor: "{colors.encre-carbone}"
  button-ghost:
    backgroundColor: "#FFFFFF99"
    textColor: "{colors.encre-carbone}"
    rounded: "{rounded.pill}"
    padding: "6px 6px 6px 22px"
  button-ghost-hover:
    backgroundColor: "{colors.encre-carbone}"
    textColor: "{colors.papier}"
  shell:
    backgroundColor: "{colors.hairline}"
    rounded: "{rounded.shell}"
    padding: "6px"
  shell-tight:
    backgroundColor: "{colors.hairline}"
    rounded: "{rounded.shell-tight}"
    padding: "5px"
  core:
    backgroundColor: "{colors.papier}"
    rounded: "{rounded.core}"
  core-tight:
    backgroundColor: "{colors.papier}"
    rounded: "{rounded.core-tight}"
  eyebrow:
    backgroundColor: "{colors.hairline}"
    textColor: "{colors.gris-tirage}"
    typography: "{typography.label}"
    rounded: "{rounded.pill}"
    padding: "7px 14px"
  res-icon:
    backgroundColor: "{colors.citron-net}"
    textColor: "{colors.citron-net-deep}"
    rounded: "{rounded.pill}"
    size: "40px"
---

# Design System: Kolya

## 1. Overview

**Creative North Star: "Le Cabinet Lumineux"**

Imagine un cabinet d'avocat ou de médecin haut de gamme dans un immeuble haussmannien. Parquet large, lumière naturelle, peu de meubles, du marbre froid réchauffé par un mur d'atelier en fond. Personne n'élève la voix, personne ne survend. Tu rentres, tu t'installes, tu sens que tu es entre des mains compétentes. C'est ça, l'expérience Kolya. Pas un cabinet glacial, pas une boutique brutaliste, pas un SaaS clinique. Un cabinet qui a une âme d'atelier.

Le système est **calme par défaut** : le visiteur ne se fait pas agresser visuellement. Les surfaces sont posées à plat, le mouvement n'apparaît qu'à son interaction. Le Citron Net (la seule couleur de marque) est rare et précieux, jamais saupoudré. La typographie éditoriale (Fraunces) porte la confiance ; le sans-serif quotidien (Plus Jakarta Sans) porte la lisibilité ; le mono (JetBrains Mono) porte les signaux techniques discrets (numéros, eyebrow, tags).

Ce que ce système refuse explicitement, en miroir des anti-références de PRODUCT.md : les gradients violet ou bleu façon "SaaS IA", le glassmorphism décoratif, la grille de cartes identiques avec icône Lucide, le hero-metric template (gros chiffre + label + accent gradient), la palette navy-and-gold de la consultancy générique, les buzzwords IA dans le copy, la sur-promesse à coups de "x10 votre business". Si une page Kolya pourrait passer pour un Wix premium ou un template Tailwind UI, elle a échoué.

**Key Characteristics:**

- Cream tiède + ink sombre + un seul accent vert citron, jamais plus.
- Architecture en double-coque (shell + core) pour chaque carte, sans exception.
- Typographie display variable (Fraunces opsz 144) à très grande échelle.
- Sections empilées avec coins arrondis 48px qui se chevauchent, comme des plaques posées les unes sur les autres.
- Motion exponentielle (ease-out quart) pour les entrées, ease snap (Apple-like) pour les états.
- Repos plat, ascension au survol seulement.
- Film grain fixe à 4,5 % d'opacité sur tout l'écran pour la matière.

## 2. Colors: La Palette Cabinet

Une palette serrée à trois rôles. Tout repose sur la rareté du Citron Net : un seul accent, jamais saupoudré, qui porte toute la signature de la marque.

### Primary

- **Citron Net** (`#C5F548`, oklch(91.8% 0.21 121)) : la couleur signature. Apparaît sur les CTAs primaires, le point pulsant des eyebrow, le cercle d'icône check des résultats, le fond de la carte CTA finale, l'accent ponctuel sur le wordmark Kolya du footer (le point). Jamais utilisée pour du texte courant, jamais pour un fond de section, jamais pour un dégradé.

### Neutral

- **Encre Carbone** (`#0E0E0C`, oklch(13% 0.002 86)) : noir légèrement chaud, jamais le `#000` brutal. Utilisé pour le texte principal, les fonds des sections sombres (Résultats, Footer), les boutons dark.
- **Encre Carbone Lift** (`#1A1A18`, oklch(18% 0.002 86)) : variante légèrement remontée, utilisée comme fond des core dans les cartes sur shell sombre, pour une impression de couche supplémentaire.
- **Papier** (`#FFFFFF`) : le fond canonical, le fond des core, le fond des sections "Solution", "Cas d'usage", "CTA".
- **Crème Atelier** (`#F5F4EF`, oklch(96% 0.005 86)) : la chaleur d'un mur d'atelier d'artisan. Le fond des sections "Problème", "Services", "Méthode", qui crée le rythme de respiration entre les sections blanches.
- **Crème Atelier Profonde** (`#ECEAE2`, oklch(93.5% 0.008 86)) : une variante un cran plus chaude, en réserve pour les surfaces qui doivent se distinguer du Crème Atelier.
- **Gris de Tirage** (`#6B6B66`, oklch(48% 0.003 86)) : texte secondaire, métadonnées, eyebrow, légendes. Jamais pour du texte de paragraphe principal.

### Support

- **Citron Net Profond** (`#1F2D0A`, oklch(28.5% 0.06 121)) : variante sombre du Citron Net, utilisée uniquement pour le texte placé sur fond Citron Net (CTA card, badge on-lime), et pour les ombres teintées du Citron Net (`0 16px 40px -16px rgba(31,45,10,0.32)`).
- **Hairline** (`#0E0E0C14`, ink à 8 % d'alpha) : la fine ligne de séparation entre les éléments (cards, lignes du Problème, séparateurs internes).
- **Hairline Soft** (`#0E0E0C0D`, ink à 5 % d'alpha) : un cran plus discret, pour les divisions vraiment subtiles.

### Named Rules

**The One Voice Rule.** Le Citron Net est la seule couleur de marque. Aucun bleu, aucun violet, aucun rouge n'apparaît jamais sur ce site. Jamais de seconde couleur d'accent. Si on a besoin de différencier deux états ou deux signifiants, on utilise la typographie, le poids, l'espace, ou la valeur (clair / sombre). Pas une autre teinte.

**The Sparingly Rule.** Le Citron Net occupe au maximum 5 % de la surface visible d'une page à un instant donné. Sa rareté est ce qui le rend précieux. Un fond Citron Net sur un grand bloc (la CTA card) est légitime parce qu'il est unique sur la page. Mais on ne sème jamais des chips, des tags, ou des bordures Citron Net à travers les sections.

**The No-Pure-Black Rule.** `#000000` est interdit. Tout noir tend vers Encre Carbone (`#0E0E0C`), légèrement chaud, légèrement vivant. Un noir pur sur un site éditorial donne un effet de trou dans l'écran, pas de présence.

## 3. Typography: Le Triple Voix

Trois familles de fontes, chacune avec un rôle qu'elle est seule à porter. Pas de concurrence, pas de fallback bricolé : chaque famille est utilisée pour ce pour quoi elle a été choisie.

**Display Font:** Fraunces (variable, opsz 9..144, weight 300/400/500, italic). Chargée depuis Google Fonts.
**Body Font:** Plus Jakarta Sans (weight 300 à 700, italic). Chargée depuis Google Fonts.
**Label/Mono Font:** JetBrains Mono (weight 400/500). Chargée depuis Google Fonts.

**Character.** Fraunces apporte la voix éditoriale : grande échelle (jusqu'à 168 px sur le hero), italique 300 pour les enchâssements lyriques (`<em>simples.</em>`, `<em>concrets.</em>`), tracking négatif serré pour la densité optique. Plus Jakarta Sans porte la lecture longue : sa hauteur d'x équilibrée et ses rondeurs amicales facilitent les paragraphes sans devenir bavardes. JetBrains Mono est la voix technique : 11 px en majuscules avec letter-spacing 0.22em pour les eyebrow, les numéros de section ([01/08]), les tags techniques sur les services. Les trois ne se croisent jamais dans la même phrase : chaque rôle est étanche.

### Hierarchy

- **Display** (Fraunces 400, clamp(56px, 10vw, 168px), line-height 0.92, tracking -0.04em, opsz 144) : réservé au H1 du hero. Une seule occurrence par page.
- **Headline** (Fraunces 400, clamp(44px, 6vw, 96px), line-height 0.94, tracking -0.04em, opsz 144) : H2 des en-têtes de section. Mélange des poids visuels via les `<em>` italique 300 qui colorent un fragment.
- **Title** (Fraunces 400, clamp(22px, 2.4vw, 36px), line-height 1.05 à 1.2, tracking -0.025em) : titres de cards (services, méthode, cas d'usage), titres de pain rows.
- **Body** (Plus Jakarta Sans 400, 16px, line-height 1.55) : paragraphes courants. Cap line length à 65–75ch dans les paragraphes longs (la lede du hero, la prose de la section Solution).
- **Lede** (Plus Jakarta Sans 400, clamp(18px, 1.4vw, 21px), line-height 1.5) : paragraphe d'introduction sous le H1, sous-titre de section.
- **Label** (JetBrains Mono 500, 10–11px, letter-spacing 0.04 à 0.22em, uppercase) : eyebrow, numéros de section, tags techniques, durées de méthode, légendes mono.

### Named Rules

**The Italics-as-Color Rule.** L'italique de Fraunces (variation 1, weight 300) n'est jamais utilisé pour insister. Il est utilisé pour **colorer émotionnellement** un fragment. *"Des solutions __simples.__ Des résultats __concrets.__"* — l'italique de "simples" et "concrets" porte le ton calme. Si on l'enlève, le titre devient correct mais sec. Si on l'ajoute partout, il perd sa force. Maximum un fragment italique par phrase.

**The opsz Rule.** Fraunces est variable sur l'axe optical-size. À grande échelle (Display, Headline), on force `font-variation-settings: "opsz" 144`. Cela rend les empattements plus contrastés, les pleins plus pleins, les déliés plus fins, ce qui donne sa qualité éditoriale. Sans cet axe forcé, Fraunces à 100 px ressemble à du Times. Avec, ça ressemble à un magazine de mode.

**The Mono-as-Signal Rule.** JetBrains Mono ne porte jamais du texte de lecture. Il porte des signaux : numéros de section, codes techniques, tags, badges. C'est le sous-titrage du film, jamais le dialogue.

## 4. Elevation: Plat au Repos

Le système est plat par défaut : aucune surface ne porte d'ombre projetée au repos. La profondeur naît de **l'inset highlight** (un fin reflet de 1px en haut, simulant une lumière qui touche un bord), du **hairline** (la fine ligne de 1px qui dessine un contour), et de la **double-coque** (shell + core qui crée déjà une stratification visuelle sans ombre).

L'ombre projetée n'apparaît qu'**à l'interaction** : au survol d'une carte ou d'un bouton, l'élévation s'incarne par un translateY négatif de 4 à 6 px, accompagné d'une ombre douce en sortie de basse intensité. C'est l'équivalent visuel d'un *"je vous écoute"* du cabinet : rien ne bouge tant qu'on ne s'adresse pas à lui.

### Shadow Vocabulary

- **Card Lift** (`box-shadow: inset 0 0 0 1px rgba(14,14,12,0.08), 0 24px 48px -24px rgba(14,14,12,0.24)`) : appliqué aux services et cas d'usage au hover. Ombre douce, large, basse, portée à -24 px pour rester subtile.
- **Card Lift Heavy** (`box-shadow: inset 0 0 0 1px rgba(14,14,12,0.08), 0 32px 64px -32px rgba(14,14,12,0.28)`) : même langage, intensité supérieure pour les services qui méritent plus de présence visuelle au hover.
- **Card Lift Soft** (`box-shadow: inset 0 0 0 1px rgba(14,14,12,0.07), 0 20px 40px -20px rgba(14,14,12,0.18)`) : pour les méthodes, plus calmes encore.
- **Citron Glow** (`0 16px 40px -16px rgba(31,45,10,0.32)`) : ombre teintée Citron Net Profond sous les surfaces lime (hero pill, accent mark de la solution, CTA card finale). C'est l'ombre qui dit "cette surface est verte, pas posée".
- **Citron Halo** (`0 8px 20px -8px rgba(197,245,72,0.6)`) : utilisé sous le res-icon (le petit cercle Citron Net dans la section Résultats sombre). Lueur lime visible parce que le fond est sombre.
- **Nav Float** (`inset 0 1px 0 rgba(255,255,255,0.7), inset 0 0 0 1px rgba(14,14,12,0.06), 0 14px 40px -16px rgba(14,14,12,0.18)`) : la nav flottante en glass est l'unique exception au "plat au repos". Elle flotte parce que c'est sa nature : elle n'est posée nulle part, elle survole le scroll.

### Named Rules

**The Calm-At-Rest Rule.** Aucune surface ne porte d'ombre projetée au repos, sauf la nav flottante (qui n'est posée nulle part) et les surfaces Citron Net (qui portent une ombre teintée verte parce que c'est leur signature). L'élévation est une **réponse** à l'interaction, pas un état par défaut.

**The Hairline-First Rule.** Avant d'envisager une ombre pour séparer deux surfaces, on essaie le hairline (`1px solid #0E0E0C14`) ou l'inset shadow (`inset 0 0 0 1px ...`). L'ombre projetée est la dernière option, pas la première.

**The No-Drop-Shadow-Décoratif Rule.** Les ombres ne sont jamais décoratives. Une ombre signale une **élévation** ou une **interaction**. Une ombre derrière un texte ("text-shadow") est interdite. Une ombre pour faire "joli" autour d'une image est interdite.

## 5. Components

### Buttons

Pattern signature : **Button-in-Button**. Chaque CTA est une pilule (radius 999px), avec une icône **encapsulée dans son propre cercle** à droite, flush avec le padding intérieur droit du bouton. Au hover, l'icône se déplace en diagonale (translate 2px / -1px) et grossit (scale 1.04), créant une **tension cinétique interne** sans déformer le bouton.

- **Shape** : pilule complète (border-radius `{rounded.pill}` = 999px), padding asymétrique `6px 6px 6px 22px` (la marge gauche est large pour le label, la marge droite est égale à la moitié de la pilule pour l'icône qui s'y loge).
- **Primary (`btn-lime`)** : fond Citron Net, texte Encre Carbone. Au hover, fond → `#D2FA60` (un cran plus saturé), icône → fond `rgba(14,14,12,0.18)` (plus sombre).
- **Ghost (`btn-ghost`)** : fond `rgba(255,255,255,0.6)` avec backdrop-filter blur(6px), inset hairline `rgba(14,14,12,0.10)`. Au hover, fond → Encre Carbone, texte → Papier.
- **Dark (`btn-dark`)** : fond Encre Carbone, texte Papier. Au hover, fond → Citron Net, texte → Encre Carbone (inverse complet).
- **On-Lime (`btn-on-lime`)** : variante pour boutons posés sur la CTA card lime. Fond `rgba(255,255,255,0.4)`, texte Citron Net Profond.
- **Active state** : `transform: scale(0.98)` (compression physique, simulation du clic).
- **Compact (`btn-sm`)** : version 30px de hauteur d'icône au lieu de 36px, padding `5px 5px 5px 16px`. Utilisée dans la nav.

### Eyebrow Pills

Le **micropill mono** qui précède chaque H2 et sert de signal "tu es ici" sur le hero. Pilule très petite, mono uppercase, letter-spacing 0.22em, fond `rgba(14,14,12,0.04)`, hairline inset. Variantes `on-dark` (fond `rgba(255,255,255,0.06)`) pour la section Résultats, et `on-lime` (fond `rgba(31,45,10,0.08)`) pour la CTA card. Le hero eyebrow porte un point Citron Net pulsant (`pulse-dot 1.6s`) à gauche.

### Cards (Shell + Core)

Pattern signature : **Double-coque**. Chaque carte est composée de deux éléments imbriqués avec des **coins concentriques calculés** (le radius extérieur moins le padding égale le radius intérieur).

- **Shell** : la coque extérieure, fond `{colors.hairline}` (très léger gris), radius `{rounded.shell}` (32px), padding `{spacing.xs}` (6px), inset hairline 1px.
- **Core** : la coque intérieure, fond Papier, radius `{rounded.core}` (26px = 32 - 6), inset highlight 1px en haut.
- **Variantes tight** : shell-tight (28px / 5px / core 22px) pour les cartes de plus petite taille.
- **Variante dark** : shell-dark (`rgba(255,255,255,0.06)` sur fond Encre Carbone) pour les cellules de la section Résultats.

### Pain Rows (Section Problème)

Pattern unique au site Kolya : une **liste verticale** de problèmes, chaque ligne étant une grille `80px / 1fr / auto` (numéro mono / titre Fraunces + sous-titre Plus Jakarta / cercle de flèche). Au hover, la ligne entière se décale de 16px à droite (`padding-left: 16px`), et le cercle de flèche bascule en Encre Carbone et tourne de -45°. C'est un mouvement de déclic, pas une animation décorative : le visiteur voit que le problème "réagit" quand il s'en approche.

### Floating Island Nav

Une pilule glass flottante, **fixée mais pas collée** au top : `padding: 18px 20px` autour, ce qui la fait flotter à 18px du bord. Backdrop-filter `blur(28px) saturate(180%)`, fond `rgba(255,255,255,0.62)`, inset highlight, inset hairline, ombre douce 14px de blur. Au scroll, padding diminue à 12px, fond passe à `0.82` d'opacité, ombre s'intensifie à 18px / 48px.

Trois zones internes :
- **Brand** (gauche) : marque + wordmark Fraunces 22px.
- **Nav-min** (centre) : pilule de liens, fond `rgba(14,14,12,0.04)`, le lien actif a un fond Papier avec ombre douce.
- **CTA Audit gratuit** (droite) : btn-lime btn-sm. Sur mobile (<540px), le label disparaît, ne reste que l'icône cercle.

### Hero Lime Pill

Élément ornemental unique sur le hero : une pilule large 240×120px, fond gradient `linear-gradient(155deg, #DEF77A 0%, #A8D332 100%)`, qui contient une silhouette de colibri SVG en mouvement de flottement (`float-soft 4.2s ease-in-out infinite`, translateY -6px). Posée au milieu du H1, entre "Des solutions" et "simples." Inset highlight 1px en haut, ombre Citron Glow en dessous.

### Section Curtain

Chaque section qui change de fond se chevauche sur la précédente avec un radius supérieur de 48px (`border-radius: 48px 48px 0 0`). Visuellement, c'est comme **des plaques posées les unes sur les autres**, qui se replient légèrement par leurs bords supérieurs. C'est l'élément le plus distinctif de la mise en page Kolya, et il ne s'applique qu'aux transitions cream → ink ou white → cream → white.

## 6. Do's and Don'ts

### Do

- **Do** utiliser le Citron Net comme un trésor : maximum 5 % de la surface visible à tout instant.
- **Do** appliquer la double-coque (shell + core) à chaque card, sans exception. `shell` = 32px / 6px / `core` = 26px (concentriques calculés).
- **Do** précéder chaque H2 d'un eyebrow micropill mono uppercase tracking 0.22em.
- **Do** préserver le `[XX/08]` à droite du hero comme repère typographique du système.
- **Do** italiquer un fragment de chaque headline avec Fraunces italic 300 pour porter la couleur émotionnelle (jamais plus d'un fragment par phrase).
- **Do** transitionner avec les courbes du système : `cubic-bezier(0.32, 0.72, 0, 1)` pour les états (380ms), `cubic-bezier(0.16, 1, 0.3, 1)` pour les entrées au scroll (1100ms).
- **Do** garder les surfaces plates au repos. L'ombre projetée n'apparaît qu'à l'interaction.
- **Do** terminer chaque section qui change de fond avec un radius `48px 48px 0 0` qui crée la sensation de plaques empilées.
- **Do** chevaucher la nav comme une île flottante (top 18px, jamais collée au bord).
- **Do** parler en français, ton calme, vocabulaire de dirigeant de PME (temps, clients, CA, sérénité).

### Don't

- **Don't** utiliser une seconde couleur d'accent. Ni bleu, ni violet, ni rouge, ni teal. Le Citron Net est seul. Référence : *"SaaS IA générique"* (PRODUCT.md anti-références).
- **Don't** utiliser `#000000`. Tout noir passe par Encre Carbone (`#0E0E0C`).
- **Don't** appliquer un dégradé sur du texte (`background-clip: text`). Jamais. Utiliser une couleur pleine, l'emphase passe par le poids ou la taille.
- **Don't** poser des bordures latérales colorées (`border-left` > 1px en couleur d'accent) sur des cards, callouts, alerts. Si une carte a besoin de signaler un statut, utiliser un eyebrow ou un badge.
- **Don't** faire du glassmorphism décoratif. Le `backdrop-filter` est utilisé exclusivement sur la nav flottante et sur le bouton ghost. Jamais sur des cards de contenu, jamais sur des images.
- **Don't** écrire le hero-metric template ("3.2× | productivité"). Référence : *"hero-metric template"* (PRODUCT.md anti-références).
- **Don't** générer une grille de cartes identiques avec icône Lucide + heading + paragraphe répétée. Référence : *"identical card grids"* (impeccable shared bans).
- **Don't** utiliser la palette navy-and-gold du consultancy générique. Référence : *"Consultancy corporate cliché"* (PRODUCT.md).
- **Don't** semer des buzzwords IA dans le copy. *"Transformation digitale"*, *"IA-powered"*, *"synergies"*, *"écosystème"*, *"révolution IA"*, *"x10 votre business"* sont interdits. Référence : *"Buzzword overload"* (PRODUCT.md).
- **Don't** utiliser `transition: all linear` ou `ease-in-out` plat. Toutes les courbes du système sont exponentielles (`ease-out-quart`, snap Apple).
- **Don't** animer `top`, `left`, `width`, `height`. Uniquement `transform` et `opacity`. `will-change` réservé aux éléments qui s'animent réellement.
- **Don't** appliquer `backdrop-blur` à un conteneur qui défile. Réservé aux éléments fixed ou sticky.
- **Don't** utiliser d'em dash (`—`) dans les titres ou le copy. Virgule, deux-points, point-virgule, point, parenthèses uniquement.
- **Don't** injecter des modales par réflexe. Préférer un inline ou une page dédiée. La modale est une laze, pas une UX.
