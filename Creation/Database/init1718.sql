CREATE TABLE IF NOT EXISTS PetProfiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    petName VARCHAR(30) NOT NULL,
    healthInfo TEXT,
    reg_date TIMESTAMP
);

-- Insert values into PetProfiles table
INSERT INTO PetProfiles (petName, healthInfo) VALUES ('Buddy', 'Likes to play fetch in the park');
INSERT INTO PetProfiles (petName, healthInfo) VALUES ('Charlie', 'Enjoys long walks on the beach');
INSERT INTO PetProfiles (petName, healthInfo) VALUES ('Max', 'Loves belly rubs');
INSERT INTO PetProfiles (petName, healthInfo) VALUES ('Lucy', 'Allergic to peanuts');
INSERT INTO PetProfiles (petName, healthInfo) VALUES ('Bella', 'Has a sensitive stomach');
INSERT INTO PetProfiles (petName, healthInfo) VALUES ('Daisy', 'Needs regular grooming');
INSERT INTO PetProfiles (petName, healthInfo) VALUES ('Milo', 'Sleeps a lot during the day');
INSERT INTO PetProfiles (petName, healthInfo) VALUES ('Luna', 'Fear of thunderstorms');
INSERT INTO PetProfiles (petName, healthInfo) VALUES ('Cooper', 'Loves to swim');
INSERT INTO PetProfiles (petName, healthInfo) VALUES ('Rocky', 'Energetic and playful');