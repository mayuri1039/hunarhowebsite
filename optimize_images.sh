#!/bin/bash
find ./assets/images -type f \( -iname "*.jpg" -o -iname "*.jpeg" \) -exec mogrify -strip -quality 75 {} +
find ./assets/images -type f -iname "*.png" -exec mogrify -strip {} +
find ./assets/images -type f -iname "*.webp" -exec sh -c 'cwebp -q 70 "$1" -o "${1%.webp}_tmp.webp" && mv "${1%.webp}_tmp.webp" "$1"' _ {} \;
