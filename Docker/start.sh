#!/bin/bash

# Loop through each test folder
for i in {1..12}
do
  # Navigate into the folder
  cd "Test$i"
  
  # Build the Docker image, tag it with the folder name
  docker-compose up --build -d
  
  # Navigate back to the original directory
  cd ..
done