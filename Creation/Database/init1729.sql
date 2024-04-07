CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(30) NOT NULL,
    pet_type VARCHAR(30) NOT NULL,
    health_info TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES
('Buddy', 'Dog', 'Regular check-ups and vaccinations are up to date'),
('Fluffy', 'Cat', 'Needs a special diet due to allergies'),
('Rocky', 'Turtle', 'Loves to bask in the sun for hours'),
('Max', 'Dog', 'Currently undergoing physical therapy'),
('Whiskers', 'Rabbit', 'Has a sensitive stomach, needs careful feeding'),
('Mittens', 'Cat', 'Requires daily grooming for long fur'),
('Spot', 'Dog', 'Energetic and loves playing fetch'),
('Gizmo', 'Ferret', 'Enjoys exploring new environments'),
('Bella', 'Hamster', 'Needs regular exercise on a wheel'),
('Simba', 'Lion', 'King of the jungle, needs a large enclosure');
