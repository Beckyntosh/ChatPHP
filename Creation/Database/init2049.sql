CREATE TABLE IF NOT EXISTS PetProfiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
petName VARCHAR(30) NOT NULL,
petType VARCHAR(30) NOT NULL,
healthInfo TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Buddy', 'Dog', 'Regular checkups are recommended.');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Whiskers', 'Cat', 'Loves to play with feather toys.');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Max', 'Dog', 'Enjoys long walks in the park.');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Fluffy', 'Rabbit', 'Needs a balanced diet with hay and vegetables.');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Oreo', 'Guinea Pig', 'Likes to explore new bedding.');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Simba', 'Lion', 'Requires daily grooming to maintain mane.');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Nemo', 'Fish', 'Ensure water temperature is suitable for tropical fish.');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Rocky', 'Turtle', 'Needs a basking lamp for warmth.');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Smokey', 'Bird', 'Providing fresh fruits and vegetables is important.');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Midnight', 'Hamster', 'Provide a wheel for exercise and enrichment.');