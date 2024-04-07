#!/bin/bash

# Loop through each test folder
for i in {1..100}
do
  # Navigate into the folder
  cd "Test$i"
  
  # Build the Docker image, tag it with the folder name
  docker-compose down
  

  # Navigate back to the original directory
  cd ..
done

docker image prune -a -f
docker volume prune 
docker container prune -f
docker network prune -f
docker system prune -a -f --volumes
