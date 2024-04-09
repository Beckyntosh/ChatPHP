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


