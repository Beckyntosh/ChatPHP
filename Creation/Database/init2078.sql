CREATE TABLE IF NOT EXISTS PetProfiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
petName VARCHAR(30) NOT NULL,
petType VARCHAR(30) NOT NULL,
healthInfo TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Buddy', 'Dog', 'Vaccination up to date');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Whiskers', 'Cat', 'Needs dental checkup');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Max', 'Dog', 'Healthy and active');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Fluffy', 'Rabbit', 'Allergies to hay');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Gizmo', 'Guinea Pig', 'Weekly grooming needed');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Charlie', 'Hamster', 'Enjoys running in wheel');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Luna', 'Bird', 'Loves sunflower seeds');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Rocky', 'Turtle', 'Requires UV light for shell health');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Simba', 'Fish', 'Tank temperature at 78°F');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Oliver', 'Snake', 'Feeding schedule every 2 weeks');