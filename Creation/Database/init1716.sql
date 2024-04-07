CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(30) NOT NULL,
    pet_type VARCHAR(30) NOT NULL,
    health_info TEXT,
    reg_date TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Buddy', 'Dog', 'Active and healthy');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Whiskers', 'Cat', 'Indoor cat, loves treats');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Max', 'Dog', 'Senior dog, needs daily walks');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Luna', 'Rabbit', 'Vegetarian diet, energetic');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Oliver', 'Bird', 'Sings in the morning, loves seeds');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Simba', 'Dog', 'Playful and friendly');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Mittens', 'Cat', 'Sleeps a lot, likes catnip');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Rocky', 'Fish', 'Requires clean water regularly');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Gizmo', 'Hamster', 'Loves running on wheel, enjoys snacks');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Bella', 'Snake', 'Eats mice, needs heat source');
