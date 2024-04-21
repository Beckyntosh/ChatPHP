# Description
ChatPHP was created for a comprehensive examination of web application code security, when generated by Large Language Models and consists of 2,500 small dynamic PHP websites. These AI-generated sites are scanned for security vulnerabilities after being deployed as standalone websites in Docker containers. The evaluation of the websites was conducted using a hybrid methodology, incorporating the Burp Suite active scanner, static analysis, and manual checks.
Our investigation zeroes in on identifying and analyzing File Upload, SQL Injection, Stored XSS, and Reflected XSS.
This approach not only underscores the potential security flaws within AI-generated PHP code but also provides a critical perspective on the reliability and security implications of deploying such code in real-world scenarios. Our evaluation confirms that 27\% of the programs generated by GPT-4 verifiably contains vulnerabilities, where this number---based on static scanning and manual verification---is potentially much higher. This poses a substantial risks to software safety and security. In an effort to contribute to the research community and foster further analysis, we have made the source codes publicly available, alongside a record enumerating the detected vulnerabilities for each sample. This study not only sheds light on the security aspects of AI-generated code but also underscores the critical need for rigorous testing and evaluation of such technologies for software development.

# Cite


# Launching the application

Download the Docker folder and the Creation/Sites, Creation/database folders

Each feature is working on it is own, it is possible to use them as it is by switching the index.php and the corresponfing init.sql files in each docker project folder.

## Copying index.php and init.sql files
To copy the desired index.php and init.sql files use the **copy_indexes.sh** script
```
chmod +x copy_indexes.sh
./copy_indexes.sh
```

Change the number according to which sites you would like to deploy. If you want to deploy sites from 2201-2300 chaneg the fileIndex and sqlIndex in the script:
```
# Initialize a counter for the index files starting from 1
fileIndex=2201

# Initialize a counter for the init.sql files starting from 1
sqlIndex=2201
```


## File upload settings

In order to use the file uplaod functions, www-data privileges msut be added to the uploads folder.

Add write privilege to the uplaods file manually:
```
chown -R www-data:www-data /home/debian/Test16/www/uploads/
```

Or use the upload **uplaods_folder.sh** script:
```
chmod +x uplaods_folder.sh
./uplaods_folder.sh
```

## Launch the docker
For manual launch use:
```
docker-compose up --build -d
```

For automated launch use the **start.sh** script and the **stop.sh** script to stop it:
```
chmod +x start.sh
./star.sh
```


