CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pet_name VARCHAR(30) NOT NULL,
pet_type VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Buddy', 'Dog', 'Has allergies to pollen');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Whiskers', 'Cat', 'Needs regular dental checkups');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Rocky', 'Dog', 'Loves long walks and playing fetch');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Mittens', 'Cat', 'Sleeps a lot and enjoys tuna treats');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Bella', 'Dog', 'Has a sensitive stomach, needs special diet');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Simba', 'Cat', 'Loves to climb and explore');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Max', 'Dog', 'Enjoys swimming and cuddling');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Luna', 'Cat', 'Very playful and affectionate');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Bailey', 'Dog', 'Loves belly rubs and chasing squirrels');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Oliver', 'Cat', 'Likes to nap in sunny spots and chase toy mice');