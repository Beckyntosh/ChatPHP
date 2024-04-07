CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pet_name VARCHAR(30) NOT NULL,
pet_type VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Buddy', 'Dog', 'Up to date with vaccinations');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Fluffy', 'Cat', 'Has a sensitive stomach');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Rocky', 'Hamster', 'Loves to run on the wheel');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Max', 'Dog', 'Needs regular grooming');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Whiskers', 'Cat', 'Indoor-only cat');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Nibbles', 'Rabbit', 'Requires daily greens');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Sunny', 'Parrot', 'Talkative and playful');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Flash', 'Fish', 'Aquarium temperature must be monitored');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Oreo', 'Guinea Pig', 'Likes to be held and cuddled');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Luna', 'Dog', 'Enjoys long walks in the park');
