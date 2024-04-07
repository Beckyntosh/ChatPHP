CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pet_name VARCHAR(30) NOT NULL,
pet_type VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Buddy', 'Dog', 'Good health condition');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Kitty', 'Cat', 'Needs regular checkups');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Max', 'Dog', 'Allergies to certain foods');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Fluffy', 'Rabbit', 'Active and playful');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Oreo', 'Guinea Pig', 'Requires special diet');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Whiskers', 'Cat', 'Overweight, needs diet plan');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Rocky', 'Hamster', 'Likes running on the wheel');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Simba', 'Lion', 'King of the jungle');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Scooby', 'Dog', 'Fear of thunderstorms');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Nemo', 'Goldfish', 'Swims gracefully in the tank');
