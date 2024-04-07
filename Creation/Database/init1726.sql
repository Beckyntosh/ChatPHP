CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(30) NOT NULL,
    pet_type VARCHAR(30) NOT NULL,
    health_info TEXT,
    reg_date TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Buddy', 'Dog', 'Healthy and active');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Whiskers', 'Cat', 'Needs regular vet visits');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Max', 'Rabbit', 'Enjoys fresh vegetables');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Fluffy', 'Hamster', 'Loves running on the wheel');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Simba', 'Lion', 'King of the jungle');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Kiki', 'Parrot', 'Talkative and colorful');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Spike', 'Hedgehog', 'Likes to curl up into a ball');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Oreo', 'Guinea Pig', 'Likes to squeak for attention');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Shadow', 'Ferret', 'Curious and playful');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Coco', 'Goldfish', 'Swims gracefully in the tank');
