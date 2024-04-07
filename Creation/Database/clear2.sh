#!/bin/bash

# Loop through each SQL file in the current directory
for file in init*.sql; do
    echo "Processing $file..."
    # Use sed to remove triple backticks followed by optional whitespace at the end of the file
    sed -i '$ { /```[[:space:]]*$/d; }' "$file"
done

echo "Processing complete. Triple backticks removed from all files."
