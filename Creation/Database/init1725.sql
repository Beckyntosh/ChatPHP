CREATE TABLE pet_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(50) NOT NULL,
    pet_type VARCHAR(50) NOT NULL,
    health_info TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES 
('Buddy', 'Dog', 'Healthy and active pup'),
('Whiskers', 'Cat', 'Loves to play with yarn'),
('Rocky', 'Hamster', 'Enjoys running on his wheel'),
('Coco', 'Bird', 'Colorful and chirpy'),
('Max', 'Rabbit', 'Loves carrots'),
('Oreo', 'Guinea Pig', 'Likes to cuddle'),
('Simba', 'Lion', 'King of the jungle'),
('Bella', 'Fish', 'Swims gracefully'),
('Shadow', 'Snake', 'Slithers around'),
('Daisy', 'Horse', 'Beautiful and strong');