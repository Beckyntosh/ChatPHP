CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(30) NOT NULL,
    pet_type VARCHAR(30) NOT NULL,
    pet_breed VARCHAR(50),
    health_info TEXT,
    reg_date TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, health_info, reg_date) VALUES ('Buddy', 'Dog', 'Labrador Retriever', 'Healthy and active', '2022-01-01');
INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, health_info, reg_date) VALUES ('Whiskers', 'Cat', 'Persian', 'Energetic and playful', '2022-01-02');
INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, health_info, reg_date) VALUES ('Rocky', 'Dog', 'German Shepherd', 'Loves long walks and belly rubs', '2022-01-03');
INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, health_info, reg_date) VALUES ('Snowball', 'Rabbit', 'Holland Lop', 'Enjoys hopping around and eating veggies', '2022-01-04');
INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, health_info, reg_date) VALUES ('Mittens', 'Cat', 'Siamese', 'Likes to nap in sunny spots', '2022-01-05');
INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, health_info, reg_date) VALUES ('Max', 'Dog', 'Golden Retriever', 'Friendly and loves to swim', '2022-01-06');
INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, health_info, reg_date) VALUES ('Oreo', 'Guinea Pig', 'Abyssinian', 'Cuddly and enjoys hay snacks', '2022-01-07');
INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, health_info, reg_date) VALUES ('Smokey', 'Cat', 'Maine Coon', 'Big and fluffy with a gentle personality', '2022-01-08');
INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, health_info, reg_date) VALUES ('Bella', 'Dog', 'Poodle', 'Smart and loves to learn new tricks', '2022-01-09');
INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, health_info, reg_date) VALUES ('Nibbles', 'Rabbit', 'Netherland Dwarf', 'Loves to explore and play with toys', '2022-01-10');