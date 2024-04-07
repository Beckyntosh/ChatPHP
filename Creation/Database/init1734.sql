CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pet_name VARCHAR(30) NOT NULL,
pet_type VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Buddy', 'Dog', 'Regular checkups required');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Whiskers', 'Cat', 'Needs special diet');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Fluffy', 'Rabbit', 'Loves carrots');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Spike', 'Hedgehog', 'Likes to hibernate');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Charlie', 'Guinea Pig', 'Enjoys cuddles');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Shadow', 'Parrot', 'Talkative bird');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Max', 'Hamster', 'Loves running on wheel');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Luna', 'Ferret', 'Playful and energetic');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Oreo', 'Rat', 'Likes to hide and seek');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Rocky', 'Tortoise', 'Enjoys basking in the sun');
