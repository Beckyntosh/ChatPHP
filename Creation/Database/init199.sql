CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pet_name VARCHAR(30) NOT NULL,
pet_type VARCHAR(30) NOT NULL,
health_info TEXT,
dietary_info TEXT,
reg_date TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, health_info, dietary_info) VALUES
('Buddy', 'Dog', 'Healthy and active', 'High-protein diet'),
('Whiskers', 'Cat', 'Sensitive stomach', 'Grain-free diet'),
('Max', 'Dog', 'Older dog, needs joint support', 'Senior dog formula'),
('Mittens', 'Cat', 'Indoor cat, low activity', 'Weight management formula'),
('Rocky', 'Hamster', 'Lively and playful', 'Vegetable-based diet'),
('Luna', 'Rabbit', 'Needs dental care', 'Hay and leafy greens diet'),
('Patch', 'Guinea Pig', 'Allergies to certain vegetables', 'Special pellet diet'),
('Polly', 'Parrot', 'Seed mix and fresh fruits diet', 'Nutritional supplements needed'),
('Oliver', 'Fish', 'Tropical fish, requires warm water', 'Specialized fish flakes'),
('Nibbles', 'Rat', 'Sensitive to odors in bedding', 'Paper pellet bedding only');