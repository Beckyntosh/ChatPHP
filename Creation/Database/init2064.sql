CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
type VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP
);

INSERT INTO pet_profiles (name, type, health_info) VALUES ('Buddy', 'Dog', 'Good health condition');
INSERT INTO pet_profiles (name, type, health_info) VALUES ('Whiskers', 'Cat', 'Needs regular check-ups');
INSERT INTO pet_profiles (name, type, health_info) VALUES ('Rocky', 'Hamster', 'Allergic to nuts');
INSERT INTO pet_profiles (name, type, health_info) VALUES ('Mittens', 'Cat', 'Overweight');
INSERT INTO pet_profiles (name, type, health_info) VALUES ('Rex', 'Dog', 'Energetic and playful');
INSERT INTO pet_profiles (name, type, health_info) VALUES ('Fluffy', 'Rabbit', 'Requires a balanced diet');
INSERT INTO pet_profiles (name, type, health_info) VALUES ('Oreo', 'Dog', 'Training in progress');
INSERT INTO pet_profiles (name, type, health_info) VALUES ('Ginger', 'Cat', 'Loves to nap');
INSERT INTO pet_profiles (name, type, health_info) VALUES ('Snowball', 'Guinea Pig', 'Schedule for vet visit');
INSERT INTO pet_profiles (name, type, health_info) VALUES ('Shadow', 'Dog', 'Loyal companion');
