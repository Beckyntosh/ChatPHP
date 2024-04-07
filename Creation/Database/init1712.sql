CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(50) NOT NULL,
    pet_type VARCHAR(50),
    health_info TEXT,
    reg_date TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Buddy', 'Dog', 'Healthy and active pup');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Whiskers', 'Cat', 'Loves sleeping and cuddling');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Rocky', 'Hamster', 'Enjoys running on the wheel');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Fluffy', 'Rabbit', 'Loves munching on carrots');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Sunny', 'Parrot', 'Can mimic various sounds');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Shadow', 'Snake', 'Enjoys basking in the sun');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Charlie', 'Goldfish', 'Swims gracefully in the tank');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Luna', 'Guinea Pig', 'Loves being petted and cuddled');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Max', 'Turtle', 'Enjoys exploring the surroundings');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Misty', 'Ferret', 'Playful and energetic');
