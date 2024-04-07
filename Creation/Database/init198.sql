CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(255) NOT NULL,
    pet_type VARCHAR(100) NOT NULL,
    pet_breed VARCHAR(100),
    pet_age INT,
    health_info TEXT,
    dietary_info TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, pet_age, health_info, dietary_info) VALUES 
('Buddy', 'Dog', 'Golden Retriever', 5, 'No health issues', 'Regular diet'),
('Whiskers', 'Cat', 'Siamese', 3, 'Allergic to certain foods', 'Special diet'),
('Max', 'Dog', 'Labrador', 4, 'Needs regular exercise', 'High protein diet'),
('Oreo', 'Rabbit', 'Dwarf Hotot', 2, 'Vaccination required', 'Hay and vegetables diet'),
('Mittens', 'Cat', 'Persian', 6, 'Indoor cat', 'Limited diet'),
('Rocky', 'Ferret', 'Sable', 1, 'Energetic and playful', 'Special diet'),
('Snowball', 'Rabbit', 'Holland Lop', 5, 'Regular checkups needed', 'Mixed vegetables diet'),
('Tigger', 'Cat', 'Bengal', 7, 'Overweight', 'Low-fat diet'),
('Cooper', 'Dog', 'Poodle', 2, 'Friendly with kids', 'Balanced diet'),
('Charlie', 'Guinea Pig', 'Abyssinian', 1, 'Needs vitamin supplements', 'Timothy hay diet');
