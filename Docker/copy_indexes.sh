#!/bin/bash

# Initialize a counter for the index files starting from 1
fileIndex=2501

# Initialize a counter for the init.sql files starting from 1
sqlIndex=2501

# Loop through each folder Test1, Test2, ..., Test100
for ((i=1; i<=100; i++)); do
    # Define the source and destination paths for index.php files
    source_index_file="/home/kali/Documents/ChatGPT_Code_Generations/GOOD/GPT_Web_Applicatio_Database/Creation/Sites/index${fileIndex}.php"
    destination_index_folder="Test${i}/www/"
    destination_index_file="${destination_index_folder}index.php"

    # Define the source and destination paths for init.sql files
    source_sql_file="/home/kali/Documents/ChatGPT_Code_Generations/GOOD/GPT_Web_Applicatio_Database/Creation/Database/init${sqlIndex}.sql"
    destination_sql_folder="Test${i}/database/"
    destination_sql_file="${destination_sql_folder}init.sql"

    # Check if the source index.php file exists
    if [ -f "$source_index_file" ]; then
        # Ensure the destination folder exists
        mkdir -p "$destination_index_folder"
        # Copy the source index.php file to the destination folder and rename it to index.php
        cp "$source_index_file" "$destination_index_file"
        echo "Copied $source_index_file to $destination_index_file"
        # Increment the fileIndex for index.php files
        ((fileIndex++))
    else
        echo "Error: $source_index_file not found."
    fi

    # Check if the source init.sql file exists
    if [ -f "$source_sql_file" ]; then
        # Ensure the destination folder exists
        mkdir -p "$destination_sql_folder"
        # Copy the source init.sql file to the destination folder and rename it to init.sql
        cp "$source_sql_file" "$destination_sql_file"
        echo "Copied $source_sql_file to $destination_sql_file"
        # Increment the sqlIndex for init.sql files
        ((sqlIndex++))
    else
        echo "Error: $source_sql_file not found."
    fi
done
