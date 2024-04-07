CREATE TABLE IF NOT EXISTS PetProfiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
petName VARCHAR(50) NOT NULL,
petType VARCHAR(50),
healthInfo TEXT,
reg_date TIMESTAMP
);

INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Buddy', 'Dog', 'Healthy and active');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Mittens', 'Cat', 'Indoor cat, requires regular grooming');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Rocky', 'Hamster', 'Likes running on wheel, needs fresh veggies daily');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Luna', 'Rabbit', 'Litter box trained, needs hay and veggies for diet');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Oreo', 'Guinea Pig', 'Social, needs plenty of hay and fresh veggies');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Coco', 'Fish', 'Tropical fish, requires specific water temperature');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Bella', 'Bird', 'Parrot, needs daily interaction and toys for stimulation');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Max', 'Turtle', 'Aquatic turtle, needs UVB lighting and aquatic environment');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Snowflake', 'Rat', 'Intelligent and social, needs chew toys and enrichment');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Simba', 'Lizard', 'Bearded dragon, needs UVB lighting and insect-based diet');