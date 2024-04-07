CREATE TABLE IF NOT EXISTS pet_profiles (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  pet_name VARCHAR(255) NOT NULL,
  pet_type VARCHAR(50),
  health_info TEXT,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert values into pet_profiles table
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES 
('Buddy', 'Dog', 'Regular check-ups with the vet'),
('Whiskers', 'Cat', 'Needs daily brushing'),
('Rocky', 'Turtle', 'Requires basking area in habitat'),
('Fluffy', 'Rabbit', 'Needs fresh hay daily'),
('Spot', 'Dog', 'Allergic to certain foods'),
('Mittens', 'Cat', 'Loves to play with toys'),
('Spike', 'Hedgehog', 'Requires special diet'),
('Coco', 'Bird', 'Needs a varied diet'),
('Max', 'Dog', 'Loves going for walks'),
('Snowball', 'Rabbit', 'Likes being petted');

