CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(30) NOT NULL,
    pet_type VARCHAR(30) NOT NULL,
    health_info TEXT,
    reg_date TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Buddy', 'Dog', 'Up to date on vaccinations and loves walks');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Whiskers', 'Cat', 'Indoor-only cat with a playful personality');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Rex', 'Dog', 'Large breed dog with a friendly demeanor');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Mittens', 'Cat', 'Senior cat who enjoys naps and cuddles');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Max', 'Dog', 'Active and loves playing fetch in the park');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Luna', 'Cat', 'Adventurous and loves exploring the backyard');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Rocky', 'Dog', 'Well-trained and great with kids');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Tom', 'Cat', 'Loves catnip and lounging in sunbeams');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Ginger', 'Dog', 'Small breed with a big personality');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Smokey', 'Cat', 'Loyal companion who enjoys lap naps');
