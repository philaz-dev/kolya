# Kolya

Site de l'agence Kolya — intégration IA pour PME à Paris et en France.

**Live** : [kolya.fr](https://www.kolya.fr)

## Structure

- `index.html` — home (hero, problème, solution, services, 20 cas d'usage, méthode, résultats, CTA)
- `contact.php` — handler du formulaire d'audit gratuit
- `assets/kolya.css` — design system complet (palette, typo, composants)
- `assets/` — images (hero, mockups, cases, illustrations, logos)
- `metiers/<slug>/index.html` — 20 pages métier (un cas d'usage par métier)
- `.htaccess` — HTTPS+www, pretty URLs, cache control
- `sitemap.xml` — 21 URLs

## Stack

Site statique HTML/CSS/PHP — pas de framework, pas de build step. Hébergé sur Hostinger (Apache + PHP).

## Design

Voir `PRODUCT.md` (brand, voix, anti-références) et `DESIGN.md` (palette OKLCH, typo Fraunces/Plus Jakarta/JetBrains Mono, composants).

## Déploiement

Upload des fichiers modifiés via File Manager Hostinger ou FTP. Le `.htaccess` force la revalidation HTML à chaque visite pour que les changements se propagent immédiatement.

Pour invalider le cache CSS/JS : incrémenter le `?v=N` dans les `<link>` HTML.
