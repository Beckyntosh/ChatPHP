CREATE TABLE IF NOT EXISTS PetProfiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(30) NOT NULL,
    pet_type VARCHAR(30) NOT NULL,
    health_info TEXT,
    reg_date TIMESTAMP
);

INSERT INTO PetProfiles (pet_name, pet_type, health_info) VALUES 
('Buddy', 'Dog', 'Vaccination up to date, eats well, enjoys walks'),
('Fluffy', 'Cat', 'Needs regular grooming, indoor-only'),
('Rocky', 'Rabbit', 'Likes fresh vegetables, needs spacious cage'),
('Max', 'Dog', 'Enjoys playing fetch, has a sensitive stomach'),
('Whiskers', 'Cat', 'Loves catnip, prefers wet food'),
('Spike', 'Hedgehog', 'Needs heat lamp, nocturnal animal'),
('Daisy', 'Bird', 'Requires daily interaction, eats seeds and fruits'),
('Luna', 'Dog', 'Loves belly rubs, needs regular exercise'),
('Coco', 'Guinea Pig', 'Needs hay and fresh veggies daily, likes to be petted'),
('Oreo', 'Rabbit', 'Indoor pet, likes to chew on cardboard')