CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pet_name VARCHAR(30) NOT NULL,
health_info TEXT NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert data into pet_profiles table
INSERT INTO pet_profiles (pet_name, health_info) VALUES ('Buddy', 'Regular check-ups scheduled');
INSERT INTO pet_profiles (pet_name, health_info) VALUES ('Spike', 'Allergic to certain foods');
INSERT INTO pet_profiles (pet_name, health_info) VALUES ('Max', 'Needs daily walks');
INSERT INTO pet_profiles (pet_name, health_info) VALUES ('Luna', 'Loves to play fetch');
INSERT INTO pet_profiles (pet_name, health_info) VALUES ('Coco', 'Picky eater');
INSERT INTO pet_profiles (pet_name, health_info) VALUES ('Rocky', 'Fear of thunderstorms');
INSERT INTO pet_profiles (pet_name, health_info) VALUES ('Milo', 'High energy levels');
INSERT INTO pet_profiles (pet_name, health_info) VALUES ('Bella', 'Enjoys belly rubs');
INSERT INTO pet_profiles (pet_name, health_info) VALUES ('Oreo', 'Shedding season');
INSERT INTO pet_profiles (pet_name, health_info) VALUES ('Simba', 'Likes to cuddle');
