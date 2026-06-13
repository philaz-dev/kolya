# Product

## Register

brand

## Users

Dirigeants et gérants de TPE-PME françaises, peu techniques, principalement dans le commerce de proximité et les services (marchés, salles de sport, artisans du bâtiment, restaurants, et secteurs voisins comme la beauté, le sport, le commerce indépendant). Profil typique : 35-55 ans, gère une équipe de 3 à 30 personnes, travaille beaucoup, sent qu'il perd du temps sur des tâches répétitives, voit ses concurrents adopter "de l'IA" sans bien comprendre quoi.

Contexte de visite : arrive sur le site via une recherche Google, une recommandation, ou une publicité LinkedIn. Lit sur desktop ou mobile, souvent entre deux rendez-vous. A 30 secondes pour décider si la page mérite plus d'attention.

Job-to-be-done en arrivant sur le site : "comprendre en 30 secondes si Kolya peut résoudre un problème concret que j'ai dans mon activité, et si oui, réserver un échange sans engagement".

## Product Purpose

Landing page d'agence d'implémentation IA pour entreprises. Le seul objectif de conversion est la réservation d'un audit gratuit de 45 minutes. Tout le reste (services, méthode, cas d'usage, résultats) sert ce but unique.

Le site doit produire trois sentiments dans cet ordre : (1) "ils me comprennent" (la section Problème), (2) "c'est concret, pas un truc de geek" (Services et Cas d'usage), (3) "j'ai envie d'avancer maintenant" (Résultats et CTA final).

Succès = taux de réservation d'audit sur visiteur unique. Pas de newsletter, pas de download, pas de funnel parallèle.

## Brand Personality

Trois mots : **Calme. Concret. Confiant.**

Voix : ne survend jamais, ne fait pas peur, ne parle pas comme un consultant. Phrases courtes, vocabulaire de dirigeant de PME (temps, clients, CA, sérénité), zéro buzzword IA ("transformation digitale", "IA-powered", "synergies", "disruption"). On nomme les problèmes par leur nom de tous les jours ("relance des clients qui décrochent", "devis qui prennent une heure"), pas en abstraction.

Tonalité émotionnelle : la précision rassurante d'un médecin de famille, pas l'enthousiasme d'un commercial SaaS. On parle au dirigeant comme à un égal qui n'a pas besoin qu'on lui explique ce qu'est une entreprise.

## Anti-references

Quatre familles à éviter par réflexe :

1. **SaaS IA générique** : gradients violet/bleu, glassmorphism décoratif, "AI-powered" répété, hero-metric template (gros chiffre, petit label, gradient accent), captures d'écran de dashboards floues.
2. **Consultancy corporate cliché** : palette navy + gold, photo de poignée de main, "leader de la transformation", logos de clients en grille uniforme, ton bureaucratique.
3. **Buzzword overload** : "synergies", "écosystème", "transformation", "disruption", "révolution", "x10 votre business". Tout terme qui ne dirait rien à un gérant de salle de sport.
4. **Sur-promesse** : chiffres invérifiables ("multipliez par 10"), garanties commerciales agressives, urgence artificielle ("plus que 3 places"), témoignages avec photos stock.

## Design Principles

1. **Concret avant tout.** Chaque énoncé montre un résultat business nommable. Si une phrase ne change rien quand on l'enlève, on l'enlève. Les chiffres sont arrondis et plausibles, jamais sortis du chapeau.

2. **Calme premium, pas tech-bling.** La confiance se gagne par l'espace, la typographie, la précision, jamais par des effets, des animations gratuites, ou des stats SaaS clichés. Un dirigeant doit sentir "ces gens sont sérieux", pas "ce site est fancy".

3. **Le dirigeant non-tech d'abord.** Chaque mot et chaque visuel doit être lisible par un gérant de salle de sport ou un artisan en 5 secondes. Zéro jargon IA. Quand un terme technique est inévitable, il est traduit en bénéfice business juste après.

4. **Une seule conversion.** Toute la page sert l'audit gratuit. Tout autre CTA (newsletter, blog, cas d'étude téléchargeable) est un parasite qui dilue l'attention. Le bouton lime est sacré.

5. **Show, don't claim.** Pas de "leader de l'IA", pas de "expertise reconnue", pas d'auto-déclaration. Les cas d'usage par métier et les illustrations portent la preuve. La crédibilité naît de la précision des exemples, pas des adjectifs.

## Accessibility & Inclusion

Niveau cible : **WCAG 2.1 AA**.

- Contraste texte ≥ 4.5:1, contraste UI ≥ 3:1. Vérifier en particulier les CTAs lime sur fond blanc et les textes muted-grey sur cream.
- Respect strict de `prefers-reduced-motion` : couper les `IntersectionObserver` reveal, désactiver le float-soft, garder le contenu visible immédiatement.
- Tap targets ≥ 44×44 px sur mobile (CTAs, items FAQ, items nav).
- Lecture clavier complète : focus visible sur tous les liens, ordre logique, accordéon FAQ pilotable au clavier (Enter/Space pour toggle).
- Texte alternatif descriptif sur toutes les images (illustrations métier, photo hero, logo).
- Aucune information portée par la couleur seule (les statuts utilisent un mot ou une icône en complément).
