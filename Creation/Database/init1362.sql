CREATE TABLE IF NOT EXISTS PetProfiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
petName VARCHAR(30) NOT NULL,
petType VARCHAR(30) NOT NULL,
healthInfo TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Buddy', 'Dog', 'Healthy and active');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Fluffy', 'Cat', 'Indoor only');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Max', 'Dog', 'Needs regular exercise');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Whiskers', 'Cat', 'Loves to play with toys');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Rocky', 'Dog', 'Requires special diet');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Mittens', 'Cat', 'Litter trained');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Luna', 'Dog', 'Friendly and social');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Snowball', 'Cat', 'Likes to explore outdoors');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Charlie', 'Dog', 'Good with kids and other pets');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Milo', 'Cat', 'Shy but affectionate');
