CREATE TABLE pet_profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(255) NOT NULL,
    pet_type VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    health_info TEXT NOT NULL
);

INSERT INTO pet_profiles (pet_name, pet_type, age, health_info) VALUES ('Buddy', 'Dog', 5, 'Healthy and active');
INSERT INTO pet_profiles (pet_name, pet_type, age, health_info) VALUES ('Fluffy', 'Cat', 3, 'Indoor cat with no health issues');
INSERT INTO pet_profiles (pet_name, pet_type, age, health_info) VALUES ('Rex', 'Dog', 2, 'Playful and energetic');
INSERT INTO pet_profiles (pet_name, pet_type, age, health_info) VALUES ('Whiskers', 'Cat', 7, 'Senior cat with arthritis');
INSERT INTO pet_profiles (pet_name, pet_type, age, health_info) VALUES ('Max', 'Dog', 4, 'Large breed with hip dysplasia');
INSERT INTO pet_profiles (pet_name, pet_type, age, health_info) VALUES ('Oreo', 'Dog', 1, 'Puppy with no health issues');
INSERT INTO pet_profiles (pet_name, pet_type, age, health_info) VALUES ('Mittens', 'Cat', 5, 'Friendly and affectionate');
INSERT INTO pet_profiles (pet_name, pet_type, age, health_info) VALUES ('Rocky', 'Dog', 6, 'Senior dog needing joint supplements');
INSERT INTO pet_profiles (pet_name, pet_type, age, health_info) VALUES ('Luna', 'Cat', 2, 'Active and playful kitten');
INSERT INTO pet_profiles (pet_name, pet_type, age, health_info) VALUES ('Leo', 'Dog', 3, 'Small breed with no health issues');
