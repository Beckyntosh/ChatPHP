CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pet_name VARCHAR(30) NOT NULL,
pet_age INT(3),
pet_type VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_age, pet_type, health_info) VALUES 
('Buddy', 3, 'Dog', 'Vaccination up to date, regular checkups'),
('Mittens', 5, 'Cat', 'Indoor cat, requires special diet'),
('Charlie', 2, 'Dog', 'Loves to play fetch, needs daily exercise'),
('Whiskers', 4, 'Hamster', 'Enjoys running on the wheel'),
('Max', 6, 'Dog', 'Senior dog, arthritis medication required'),
('Fluffy', 1, 'Rabbit', 'Needs plenty of fresh vegetables'),
('Bella', 7, 'Cat', 'Strictly indoor, diabetic, needs insulin shots'),
('Rocky', 4, 'Turtle', 'Aquatic habitat needed'),
('Luna', 2, 'Bird', 'Talkative, enjoys interacting with music'),
('Oliver', 5, 'Guinea Pig', 'Likes to cuddle, needs vitamin C supplement');
