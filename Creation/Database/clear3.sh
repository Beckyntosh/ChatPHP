#!/bin/bash

# This script assumes you want to keep everything from the first occurrence of "CREATE TABLE" onwards.

for file in init*.sql; do
    echo "Processing $file..."
    
    # Capture everything from the first occurrence of "CREATE TABLE" to the end of the file
    # This uses GNU sed extended regex mode (-r), might need -E for BSD/macOS sed
    sed -n -i -r '/CREATE TABLE/,$p' "$file"
done

echo "Processing complete."
