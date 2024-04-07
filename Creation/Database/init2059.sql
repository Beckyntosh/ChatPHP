CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pet_name VARCHAR(30) NOT NULL,
health_info TEXT NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, health_info) VALUES ('Buddy', 'Healthy and active');
INSERT INTO pet_profiles (pet_name, health_info) VALUES ('Max', 'Needs regular check-ups');
INSERT INTO pet_profiles (pet_name, health_info) VALUES ('Luna', 'Allergies to certain foods');
INSERT INTO pet_profiles (pet_name, health_info) VALUES ('Charlie', 'Recovering from surgery');
INSERT INTO pet_profiles (pet_name, health_info) VALUES ('Bella', 'Regular vaccinations');
INSERT INTO pet_profiles (pet_name, health_info) VALUES ('Cooper', 'Special diet required');
INSERT INTO pet_profiles (pet_name, health_info) VALUES ('Daisy', 'Active and playful');
INSERT INTO pet_profiles (pet_name, health_info) VALUES ('Rocky', 'Heart condition');
INSERT INTO pet_profiles (pet_name, health_info) VALUES ('Molly', 'Needs daily medication');
INSERT INTO pet_profiles (pet_name, health_info) VALUES ('Oscar', 'Junior pet, training in progress');
