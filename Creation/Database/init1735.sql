CREATE TABLE IF NOT EXISTS pet_profiles (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  pet_name VARCHAR(30) NOT NULL,
  pet_type VARCHAR(30) NOT NULL,
  health_info TEXT,
  reg_date TIMESTAMP
);

-- Insert sample data
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Buddy', 'Dog', 'Healthy and active');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Fluffy', 'Cat', 'Needs regular grooming');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Max', 'Parrot', 'Loves to mimic sounds');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Luna', 'Fish', 'Requires clean water environment');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Cocoa', 'Hamster', 'Enjoys running in the wheel');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Simba', 'Lion', 'Requires a large habitat');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Oreo', 'Rabbit', 'Likes to chew on hay');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Rocky', 'Turtle', 'Requires a basking spot');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Shadow', 'Guinea Pig', 'Needs Vitamin C supplement');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Milo', 'Snake', 'Eats live prey');