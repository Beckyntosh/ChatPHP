CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
type VARCHAR(30) NOT NULL,
age INT(3),
health_info TEXT,
reg_date TIMESTAMP
);

INSERT INTO pet_profiles (name, type, age, health_info) VALUES ('Buddy', 'Dog', 5, 'Regular checkups and vaccinations.');
INSERT INTO pet_profiles (name, type, age, health_info) VALUES ('Whiskers', 'Cat', 3, 'Indoor cat with a balanced diet.');
INSERT INTO pet_profiles (name, type, age, health_info) VALUES ('Max', 'Dog', 2, 'Loves to play fetch and go hiking.');
INSERT INTO pet_profiles (name, type, age, health_info) VALUES ('Spike', 'Hedgehog', 1, 'Requires a warm and quiet environment.');
INSERT INTO pet_profiles (name, type, age, health_info) VALUES ('Coco', 'Bird', 4, 'Regular nail trims and fresh fruits in diet.');
INSERT INTO pet_profiles (name, type, age, health_info) VALUES ('Luna', 'Cat', 7, 'Sensitive stomach, needs special diet.');
INSERT INTO pet_profiles (name, type, age, health_info) VALUES ('Rocky', 'Dog', 6, 'Loves to swim and play in the park.');
INSERT INTO pet_profiles (name, type, age, health_info) VALUES ('Charlie', 'Rabbit', 2, 'Indoor with plenty of hay and fresh veggies.');
INSERT INTO pet_profiles (name, type, age, health_info) VALUES ('Bella', 'Fish', 1, 'Maintain proper water temperature and feeding schedule.');
INSERT INTO pet_profiles (name, type, age, health_info) VALUES ('Shadow', 'Snake', 4, 'Supervised handling and regular tank cleanings.');
