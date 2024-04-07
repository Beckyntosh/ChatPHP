
CREATE DATABASE IF NOT EXISTS my_database;

USE my_database;

CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    petName VARCHAR(30) NOT NULL,
    petType VARCHAR(30) NOT NULL,
    petAge INT(3),
    healthInfo TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO pet_profiles (petName, petType, petAge, healthInfo) VALUES ('Buddy', 'Dog', 5, 'Healthy and active');
INSERT INTO pet_profiles (petName, petType, petAge, healthInfo) VALUES ('Whiskers', 'Cat', 3, 'Likes sleeping all day');
INSERT INTO pet_profiles (petName, petType, petAge, healthInfo) VALUES ('Spot', 'Dog', 7, 'Enjoys long walks');
INSERT INTO pet_profiles (petName, petType, petAge, healthInfo) VALUES ('Fluffy', 'Hamster', 1, 'Loves to run on wheel');
INSERT INTO pet_profiles (petName, petType, petAge, healthInfo) VALUES ('Snowball', 'Rabbit', 4, 'Likes carrots and lettuce');
INSERT INTO pet_profiles (petName, petType, petAge, healthInfo) VALUES ('Oreo', 'Guinea Pig', 2, 'Likes to be cuddled');
INSERT INTO pet_profiles (petName, petType, petAge, healthInfo) VALUES ('Simba', 'Cat', 6, 'Loves to play with toys');
INSERT INTO pet_profiles (petName, petType, petAge, healthInfo) VALUES ('Max', 'Dog', 4, 'Good with kids and other pets');
INSERT INTO pet_profiles (petName, petType, petAge, healthInfo) VALUES ('Nibbles', 'Rabbit', 2, 'Likes hay and fresh vegetables');
INSERT INTO pet_profiles (petName, petType, petAge, healthInfo) VALUES ('Gizmo', 'Hamster', 1, 'Super energetic and curious');