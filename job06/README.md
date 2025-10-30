# Job06 - Konami La Plateforme_

But: Par défaut, `index.php` reste neutre. Lorsqu'un utilisateur entre la séquence Konami (↑ ↑ ↓ ↓ ← → ← → B A), la page passe en thème "La Plateforme_".

Fichiers créés:
- `index.php` — page principale (HTML + inclusion CSS/JS)
- `assets/css/style.css` — styles par défaut et `.lp-theme` activé
- `assets/js/konami.js` — écouteur clavier pour la séquence Konami

Tester localement:
1. Placez le dossier `job06` dans votre www (déjà fait si vous avez suivi ce dépôt).
2. Démarrez WAMP.
3. Ouvrez dans le navigateur : http://localhost/runtrack3/jour02/job06/
4. Sur la page, tapez la séquence : flèche haut, flèche haut, flèche bas, flèche bas, flèche gauche, flèche droite, flèche gauche, flèche droite, b, a.

Notes / Hypothèses:
- J'ai choisi une palette violette/jaune inspirée d'un style "La Plateforme_". Si vous avez des couleurs officielles, je peux les remplacer.
- Un geste tactile rapide (5 tap) active également le thème sur mobile.

Si vous voulez :
- que le thème s'annule si on retape le code, je peux l'ajouter.
- des couleurs officielles, fournissez les codes hex et je mets à jour.
