#!/bin/bash

# Empty the output file if it already exists
> empty_files.txt

# Loop through all init*.sql files
for file in init*.sql; do
    # Check if the file is empty
    if [ ! -s "$file" ]; then
        # Extract the number from the filename and append it to empty_files.txt
        [[ $file =~ init([0-9]+).sql ]] && echo "${BASH_REMATCH[1]}" >> empty_files.txt
    fi
done

echo "Finished. The numbers of empty files are recorded in empty_files.txt."
