CREATE TABLE pet_profiles (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      pet_name VARCHAR(30) NOT NULL,
      pet_type VARCHAR(30) NOT NULL,
      health_info TEXT NOT NULL,
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Buddy', 'Dog', 'Vaccination up to date');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Fluffy', 'Cat', 'Needs dental checkup');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Rex', 'Dog', 'Allergies to certain foods');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Whiskers', 'Cat', 'Healthy and active');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Max', 'Dog', 'Schedule heartworm prevention');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Mittens', 'Cat', 'Regular grooming needed');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Charlie', 'Dog', 'Training in progress');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Oreo', 'Guinea Pig', 'Special diet requirements');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Luna', 'Rabbit', 'Requires daily exercise');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Sasha', 'Bird', 'Annual checkup due soon');
