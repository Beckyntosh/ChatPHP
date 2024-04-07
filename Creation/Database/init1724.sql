CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pet_name VARCHAR(30) NOT NULL,
pet_type VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Buddy', 'Dog', 'Regular checkups every 6 months, loves to run in the park');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Whiskers', 'Cat', 'Indoor cat, playful and likes to nap');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Rocky', 'Rabbit', 'Loves carrots, hops around the garden');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Coco', 'Parrot', 'Talkative, enjoys singing and mimicry');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Shadow', 'Fish', 'Beta fish, likes a quiet environment');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Max', 'Guinea Pig', 'Loves fresh vegetables, friendly');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Milo', 'Hamster', 'Loves to run on its wheel, cheeky');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Luna', 'Turtle', 'Enjoys basking in the sun, slow eater');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Leo', 'Snake', 'Non-venomous, needs a warm enclosure');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Bella', 'Ferret', 'Playful, likes to hide small objects');

