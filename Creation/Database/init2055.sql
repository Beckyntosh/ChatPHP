CREATE TABLE IF NOT EXISTS PetProfiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    petName VARCHAR(30) NOT NULL,
    petType VARCHAR(30) NOT NULL,
    healthInfo TEXT NOT NULL,
    regDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Buddy', 'Dog', 'Active and healthy');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Whiskers', 'Cat', 'Needs regular check-ups');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Rocky', 'Horse', 'Energetic and playful');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Charlie', 'Bird', 'Requires special diet');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Max', 'Hamster', 'Loves running on the wheel');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Luna', 'Rabbit', 'Likes fresh vegetables');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Shadow', 'Fish', 'Needs clean water and regular feeding');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Cooper', 'Turtle', 'Enjoys basking in the sun');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Milo', 'Guinea Pig', 'Needs plenty of hay and fresh veggies');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Oreo', 'Ferret', 'Requires a spacious cage and toys');