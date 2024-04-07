CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(50) NOT NULL,
    pet_type VARCHAR(50) NOT NULL,
    pet_breed VARCHAR(50),
    health_info TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, health_info) VALUES 
('Buddy', 'Dog', 'Labrador', 'Up to date with all vaccinations'),
('Fluffy', 'Cat', 'Siamese', 'Loves to play with toys'),
('Max', 'Dog', 'Golden Retriever', 'Needs daily exercise'),
('Mittens', 'Cat', 'Tabby', 'Indoor-only cat'),
('Rocky', 'Dog', 'German Shepherd', 'Good with kids'),
('Whiskers', 'Cat', 'Persian', 'Likes to be groomed regularly'),
('Coco', 'Dog', 'Poodle', 'Allergic to certain foods'),
('Oreo', 'Dog', 'Border Collie', 'Highly intelligent breed'),
('Luna', 'Cat', 'Maine Coon', 'Enjoys being outdoors'),
('Simba', 'Dog', 'Shiba Inu', 'Independent personality');
