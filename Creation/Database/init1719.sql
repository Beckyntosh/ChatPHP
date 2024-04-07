CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pet_name VARCHAR(30) NOT NULL,
pet_type VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Buddy', 'Dog', 'Good health');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Fluffy', 'Cat', 'Requires regular check-ups');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Max', 'Dog', 'Allergic to seafood');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Whiskers', 'Cat', 'Needs dental care');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Rocky', 'Dog', 'Active and healthy');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Mittens', 'Cat', 'Overweight');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Coco', 'Dog', 'On a special diet');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Kitty', 'Cat', 'Loves napping');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Rex', 'Dog', 'Fear of thunderstorms');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Shadow', 'Cat', 'Playful and energetic');
