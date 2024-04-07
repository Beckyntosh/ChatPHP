CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(30) NOT NULL,
    pet_type VARCHAR(30) NOT NULL,
    health_info TEXT,
    reg_date TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Buddy', 'Dog', 'Healthy and active');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Whiskers', 'Cat', 'Indoor cat, requires regular grooming');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Max', 'Dog', 'Senior dog, needs joint supplements');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Luna', 'Rabbit', 'Litter trained, enjoys fresh veggies');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Simba', 'Lion', 'Wild animal, requires zoo habitat');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Coco', 'Bird', 'Feathers regularly groomed and clipped');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Bella', 'Dog', 'Allergies to certain foods, needs special diet');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Oreo', 'Guinea Pig', 'Energetic and loves running in his wheel');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Charlie', 'Snake', 'Carnivorous, needs live food for diet');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Mittens', 'Cat', 'Hairball issues, needs regular brushing and hairball treats');