CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pet_name VARCHAR(30) NOT NULL,
pet_type VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Buddy', 'Dog', 'Good health');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Fluffy', 'Cat', 'Vaccinated');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Max', 'Dog', 'Regular checkups');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Whiskers', 'Cat', 'Allergic to fish');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Rocky', 'Guinea Pig', 'Needs exercise');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Luna', 'Rabbit', 'Loves carrots');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Charlie', 'Bird', 'Sings a lot');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Daisy', 'Fish', 'Tank temperature controlled');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Oreo', 'Hamster', 'Likes running wheel');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Simba', 'Lion', 'Large enclosure');
