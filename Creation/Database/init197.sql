CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pet_name VARCHAR(30) NOT NULL,
pet_type VARCHAR(30),
pet_breed VARCHAR(50),
owner_name VARCHAR(50),
health_info TEXT,
dietary_info TEXT,
reg_date TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, owner_name, health_info, dietary_info) VALUES ('Buddy', 'Dog', 'Golden Retriever', 'John Smith', 'Vaccinated and healthy', 'High protein diet');
INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, owner_name, health_info, dietary_info) VALUES ('Whiskers', 'Cat', 'Siamese', 'Alice Jones', 'Indoor cat', 'Special diet for allergies');
INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, owner_name, health_info, dietary_info) VALUES ('Rex', 'Dog', 'German Shepherd', 'David Brown', 'Active and playful', 'Balanced diet with supplements');
INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, owner_name, health_info, dietary_info) VALUES ('Oreo', 'Dog', 'Labrador Retriever', 'Sarah White', 'Separation anxiety', 'Grain-free diet');
INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, owner_name, health_info, dietary_info) VALUES ('Mittens', 'Cat', 'Tabby', 'Emily Taylor', 'Likes to play outdoors', 'Wet food only');
INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, owner_name, health_info, dietary_info) VALUES ('Max', 'Dog', 'Poodle', 'Michael Wilson', 'Training for obedience', 'Raw diet');
INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, owner_name, health_info, dietary_info) VALUES ('Lucky', 'Dog', 'Chihuahua', 'Jessica Lee', 'Small but energetic', 'Small breed kibble');
INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, owner_name, health_info, dietary_info) VALUES ('Kitty', 'Cat', 'Persian', 'Daniel Brown', 'Adopted from shelter', 'Homemade meals only');
INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, owner_name, health_info, dietary_info) VALUES ('Rocky', 'Dog', 'Boxer', 'Amanda Green', 'Regular vet check-ups', 'Gluten-free diet');
INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, owner_name, health_info, dietary_info) VALUES ('Smokey', 'Cat', 'Maine Coon', 'Chris Johnson', 'Loves to cuddle', 'Fish-based diet');
