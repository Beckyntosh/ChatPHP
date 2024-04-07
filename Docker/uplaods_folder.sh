#!/bin/bash

# Loop through each Test{i}/www folder
for folder in Test*/www/; do
    # Change ownership of the upload folder to www-data
    chown -R www-data:www-data "${folder}upload"
    echo "Changed ownership of upload folder in $folder"
done
