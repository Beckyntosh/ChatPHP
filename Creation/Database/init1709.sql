CREATE TABLE IF NOT EXISTS pets (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        pet_name VARCHAR(30) NOT NULL,
        pet_type VARCHAR(30) NOT NULL,
        pet_breed VARCHAR(50),
        health_info TEXT,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

INSERT INTO pets (pet_name, pet_type, pet_breed, health_info) VALUES ('Buddy', 'Dog', 'Labrador Retriever', 'Healthy and active');
INSERT INTO pets (pet_name, pet_type, pet_breed, health_info) VALUES ('Whiskers', 'Cat', 'Siamese', 'Indoor and pampered');
INSERT INTO pets (pet_name, pet_type, pet_breed, health_info) VALUES ('Max', 'Dog', 'German Shepherd', 'Training for agility competitions');
INSERT INTO pets (pet_name, pet_type, pet_breed, health_info) VALUES ('Fluffy', 'Rabbit', 'Lionhead', 'Loves fresh veggies and hay');
INSERT INTO pets (pet_name, pet_type, pet_breed, health_info) VALUES ('Mittens', 'Cat', 'Maine Coon', 'Loves sunbathing by the window');
INSERT INTO pets (pet_name, pet_type, pet_breed, health_info) VALUES ('Rocky', 'Dog', 'Boxer', 'Energetic and playful');
INSERT INTO pets (pet_name, pet_type, pet_breed, health_info) VALUES ('Nibbles', 'Rabbit', 'Netherland Dwarf', 'Likes exploring and digging');
INSERT INTO pets (pet_name, pet_type, pet_breed, health_info) VALUES ('Oreo', 'Cat', 'Russian Blue', 'Likes to nap in cozy spots');
INSERT INTO pets (pet_name, pet_type, pet_breed, health_info) VALUES ('Marley', 'Dog', 'Labradoodle', 'Therapy dog in training');
INSERT INTO pets (pet_name, pet_type, pet_breed, health_info) VALUES ('Snowball', 'Rabbit', 'Mini Lop', 'Enjoys hopping around and playing with toys');
