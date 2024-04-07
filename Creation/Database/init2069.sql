CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
petName VARCHAR(30) NOT NULL,
petType VARCHAR(30) NOT NULL,
healthInfo TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO pet_profiles (petName, petType, healthInfo) VALUES ('Buddy', 'Dog', 'Good health');
INSERT INTO pet_profiles (petName, petType, healthInfo) VALUES ('Fluffy', 'Cat', 'Needs regular check-ups');
INSERT INTO pet_profiles (petName, petType, healthInfo) VALUES ('Rex', 'Dog', 'Allergies');
INSERT INTO pet_profiles (petName, petType, healthInfo) VALUES ('Whiskers', 'Cat', 'Healthy and playful');
INSERT INTO pet_profiles (petName, petType, healthInfo) VALUES ('Max', 'Dog', 'Regular vaccinations required');
INSERT INTO pet_profiles (petName, petType, healthInfo) VALUES ('Mittens', 'Cat', 'Older cat, needs special diet');
INSERT INTO pet_profiles (petName, petType, healthInfo) VALUES ('Luna', 'Dog', 'Active and energetic');
INSERT INTO pet_profiles (petName, petType, healthInfo) VALUES ('Charlie', 'Dog', 'Recovering from surgery');
INSERT INTO pet_profiles (petName, petType, healthInfo) VALUES ('Oreo', 'Cat', 'Indoor cat, shy personality');
INSERT INTO pet_profiles (petName, petType, healthInfo) VALUES ('Bella', 'Dog', 'Loves long walks and treats');
