#!/bin/bash

# Loop through all files matching the pattern init*.sql
for file in init*.sql; do
    # Use sed to remove lines containing ```sql and save the changes in-place
    sed -i '/```sql/d' "$file"
done

echo "Backticks removed from all files."
