#!/usr/bin/env bash
# Régénère le PDF du livre blanc "10 cas d'usage IA pour PME" depuis la
# source HTML stylée print. À lancer depuis la racine du projet Kolya.
#
# Usage :
#   .tools/generate-guide-pdf.sh
#
# Pré-requis : Google Chrome installé sur macOS (chemin standard).
# Le script :
#   - lit .tools/guide-pdf-source.html (source maintenue à la main)
#   - lance Chrome en mode headless print
#   - écrit le PDF dans assets/guide-10-cas-usage-ia-pme.pdf
#   - affiche la taille du fichier produit

set -euo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
SRC="$ROOT/.tools/guide-pdf-source.html"
OUT="$ROOT/assets/guide-10-cas-usage-ia-pme.pdf"
CHROME="/Applications/Google Chrome.app/Contents/MacOS/Google Chrome"

if [ ! -f "$SRC" ]; then
  echo "Source HTML introuvable : $SRC" >&2
  exit 1
fi

if [ ! -x "$CHROME" ]; then
  echo "Google Chrome introuvable au chemin attendu : $CHROME" >&2
  exit 1
fi

echo "Génération du PDF depuis $SRC ..."
"$CHROME" \
  --headless=new \
  --disable-gpu \
  --no-pdf-header-footer \
  --virtual-time-budget=8000 \
  --print-to-pdf="$OUT" \
  "file://$SRC"

if [ ! -f "$OUT" ]; then
  echo "Échec de génération : $OUT non créé" >&2
  exit 1
fi

SIZE=$(ls -lh "$OUT" | awk '{print $5}')
echo "PDF généré : $OUT ($SIZE)"
echo "Prochaine étape : git add $OUT && git commit && git push"
