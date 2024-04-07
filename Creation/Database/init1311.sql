CREATE TABLE IF NOT EXISTS pets (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pet_name VARCHAR(30) NOT NULL,
pet_type VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO pets (pet_name, pet_type, health_info) VALUES ('Buddy', 'Dog', 'Regular check-ups and vaccinations');
INSERT INTO pets (pet_name, pet_type, health_info) VALUES ('Fluffy', 'Cat', 'Indoor only, special diet required');
INSERT INTO pets (pet_name, pet_type, health_info) VALUES ('Charlie', 'Rabbit', 'Needs exercise and dental care');
INSERT INTO pets (pet_name, pet_type, health_info) VALUES ('Max', 'Bird', 'Regular wing trimming required');
INSERT INTO pets (pet_name, pet_type, health_info) VALUES ('Luna', 'Fish', 'Tank temperature must be monitored');
INSERT INTO pets (pet_name, pet_type, health_info) VALUES ('Rocky', 'Turtle', 'Weekly shell cleaning necessary');
INSERT INTO pets (pet_name, pet_type, health_info) VALUES ('Milo', 'Hamster', 'Provide bedding and exercise wheel');
INSERT INTO pets (pet_name, pet_type, health_info) VALUES ('Lucy', 'Guinea Pig', 'Fresh vegetables are vital in diet');
INSERT INTO pets (pet_name, pet_type, health_info) VALUES ('Oreo', 'Ferret', 'Requires regular grooming and playtime');
INSERT INTO pets (pet_name, pet_type, health_info) VALUES ('Bella', 'Snake', 'Feeding schedule must be followed');