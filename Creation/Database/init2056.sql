CREATE TABLE IF NOT EXISTS PetProfiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    petName VARCHAR(30) NOT NULL,
    petType VARCHAR(30) NOT NULL,
    healthInfo TEXT,
    reg_date TIMESTAMP
);

INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Buddy', 'Dog', 'Healthy and active');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Whiskers', 'Cat', 'Indoor only, special diet');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Max', 'Dog', 'Needs regular exercise and grooming');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Fluffy', 'Rabbit', 'Likes fresh vegetables and hay');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Mittens', 'Cat', 'Playful and loves attention');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Rocky', 'Turtle', 'Requires a large tank with UV light');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Coco', 'Dog', 'Allergic to certain foods, needs special diet');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Snowball', 'Hamster', 'Likes running in exercise wheel');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Spike', 'Hedgehog', 'Needs a warm and quiet environment');
INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('Luna', 'Cat', 'Loves to nap in sunny spots');
