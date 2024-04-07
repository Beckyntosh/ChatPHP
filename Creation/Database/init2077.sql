CREATE TABLE pet_profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    petName VARCHAR(255) NOT NULL,
    petType VARCHAR(255) NOT NULL,
    healthInfo TEXT NOT NULL
);

INSERT INTO pet_profiles (petName, petType, healthInfo) VALUES ('Buddy', 'Dog', 'Healthy and active');
INSERT INTO pet_profiles (petName, petType, healthInfo) VALUES ('Whiskers', 'Cat', 'Needs regular checkups');
INSERT INTO pet_profiles (petName, petType, healthInfo) VALUES ('Max', 'Dog', 'Likes to play fetch');
INSERT INTO pet_profiles (petName, petType, healthInfo) VALUES ('Mittens', 'Cat', 'Loves to nap in the sun');
INSERT INTO pet_profiles (petName, petType, healthInfo) VALUES ('Rex', 'Dog', 'Obeys basic commands');
INSERT INTO pet_profiles (petName, petType, healthInfo) VALUES ('Smokey', 'Cat', 'Likes to explore outdoors');
INSERT INTO pet_profiles (petName, petType, healthInfo) VALUES ('Luna', 'Dog', 'Enjoys long walks in the park');
INSERT INTO pet_profiles (petName, petType, healthInfo) VALUES ('Bella', 'Cat', 'Has a playful personality');
INSERT INTO pet_profiles (petName, petType, healthInfo) VALUES ('Rocky', 'Dog', 'Good with kids and other pets');
INSERT INTO pet_profiles (petName, petType, healthInfo) VALUES ('Coco', 'Cat', 'Enjoys cuddling on the couch');
