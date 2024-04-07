CREATE TABLE IF NOT EXISTS pet_profiles (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  pet_name VARCHAR(30) NOT NULL,
  age INT(3),
  type VARCHAR(30),
  breed VARCHAR(50),
  health_info TEXT,
  dietary_info TEXT,
  reg_date TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, age, type, breed, health_info, dietary_info) VALUES 
('Fluffy', 5, 'Dog', 'Labrador', 'Regular check-ups required', 'High protein diet'),
('Whiskers', 3, 'Cat', 'Siamese', 'No known health issues', 'Indoor diet only'),
('Buddy', 2, 'Dog', 'Golden Retriever', 'Allergies to grains', 'Special grain-free diet'),
('Mittens', 4, 'Cat', 'Persian', 'Needs daily grooming', 'Regular cat food'),
('Spot', 6, 'Dog', 'Dalmatian', 'Sensitive stomach', 'Limited ingredient diet'),
('Oscar', 1, 'Rabbit', 'Mini Lop', 'Needs plenty of hay', 'Fresh veggies daily'),
('Coco', 7, 'Dog', 'Poodle', 'Arthritis, needs joint supplements', 'Low-fat diet'),
('Snowball', 4, 'Rabbit', 'Holland Lop', 'Likes to chew on toys', 'Timothy hay only'),
('Max', 5, 'Hamster', 'Syrian', 'Regular exercise needed', 'Hamster pellets'),
('Lola', 2, 'Guinea Pig', 'Abyssinian', 'Loves to burrow', 'Fresh vegetables only');