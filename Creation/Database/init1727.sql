CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(30) NOT NULL,
    pet_type VARCHAR(30) NOT NULL,
    health_info TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Buddy', 'Dog', 'Healthy and active dog.');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Whiskers', 'Cat', 'Likes to sleep all day.');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Rex', 'Dog', 'Loves playing fetch.');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Fluffy', 'Rabbit', 'Enjoys fresh veggies.');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Mittens', 'Cat', 'Cuddly and friendly.');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Charlie', 'Dog', 'Good with kids.');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Bella', 'Cat', 'Independent and curious.');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Rocky', 'Dog', 'Energetic and playful.');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Oreo', 'Cat', 'Loves to lounge in sunbeams.');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Max', 'Dog', 'Loyal and protective.');
