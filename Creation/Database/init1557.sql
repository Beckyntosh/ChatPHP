CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(30) NOT NULL,
    pet_type VARCHAR(30) NOT NULL,
    health_info TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Buddy', 'Dog', 'Regular check-ups scheduled with vet');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Whiskers', 'Cat', 'Allergy to certain foods, requires special diet');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Max', 'Dog', 'Likes to play catch, enjoys long walks');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Mittens', 'Cat', 'Indoor-only, does not like outdoors');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Rocky', 'Dog', 'Loves belly rubs, afraid of thunderstorms');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Smokey', 'Cat', 'Loves to nap in sunny spots');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Luna', 'Dog', 'Energetic and loves to play fetch');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Fluffy', 'Cat', 'Needs regular grooming due to long fur');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Rex', 'Dog', 'Training for agility competitions');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Chloe', 'Cat', 'Likes to chase laser pointer');