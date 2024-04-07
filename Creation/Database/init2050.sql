CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(30) NOT NULL,
    pet_type VARCHAR(30) NOT NULL,
    health_info TEXT,
    reg_date TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Buddy', 'Dog', 'Regular check-ups required');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Whiskers', 'Cat', 'Indoor cat, no outdoor exposure');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Max', 'Dog', 'Allergy to certain foods');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Charlie', 'Fish', 'Tank temperature should be regulated');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Luna', 'Cat', 'Needs daily exercise and playtime');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Rocky', 'Dog', 'Loves swimming, keep hydrated');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Oliver', 'Bird', 'Requires regular grooming for feathers');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Milo', 'Rabbit', 'Hay is main source of diet, limited treats');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Lucy', 'Dog', 'Sensitive stomach, monitor food intake');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Ruby', 'Guinea Pig', 'Needs vitamin C supplement in diet');