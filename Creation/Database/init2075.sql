CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(50),
    pet_type VARCHAR(30),
    pet_breed VARCHAR(50),
    health_info TEXT,
    owner_name VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, health_info, owner_name) VALUES 
('Buddy', 'Dog', 'Labrador Retriever', 'Healthy and active puppy', 'Samantha'),
('Whiskers', 'Cat', 'Siamese', 'Indoor cat, occasional treats', 'Michael'),
('Max', 'Dog', 'Golden Retriever', 'Has allergies, needs special diet', 'Jennifer'),
('Fluffy', 'Rabbit', 'Lionhead', 'Enjoys hay and fresh veggies', 'Daniel'),
('Mittens', 'Cat', 'Persian', 'Lazy but affectionate', 'Emily'),
('Rocky', 'Dog', 'Pitbull', 'Adopted, recovering from surgery', 'Brian'),
('Snowball', 'Hamster', 'Syrian', 'Loves running on the wheel', 'Jessica'),
('Coco', 'Dog', 'Chihuahua', 'Small but energetic', 'Cynthia'),
('Oliver', 'Cat', 'Maine Coon', 'Overweight, needs special diet', 'Adam'),
('Nemo', 'Fish', 'Clownfish', 'Swims with coral decorations', 'Michelle');
