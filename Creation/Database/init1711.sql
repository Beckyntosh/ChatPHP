CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pet_name VARCHAR(30) NOT NULL,
pet_type VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, health_info)
VALUES ('Buddy', 'Dog', 'Healthy and active'),
('Fluffy', 'Cat', 'Requires special diet'),
('Max', 'Bird', 'Likes to sing'),
('Luna', 'Rabbit', 'Litter trained'),
('Charlie', 'Dog', 'Has allergies'),
('Mittens', 'Cat', 'Loves to play with toys'),
('Rocky', 'Turtle', 'Enjoys swimming'),
('Marley', 'Fish', 'Requires specific water temperature'),
('Oreo', 'Guinea Pig', 'Friendly and sociable'),
('Simba', 'Hamster', 'Loves running on wheel');
