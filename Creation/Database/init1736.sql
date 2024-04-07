CREATE TABLE IF NOT EXISTS pets (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
species VARCHAR(50),
age INT,
health_info TEXT,
reg_date TIMESTAMP
);

INSERT INTO pets (name, species, age, health_info) VALUES ('Buddy', 'Dog', 5, 'Healthy and active');
INSERT INTO pets (name, species, age, health_info) VALUES ('Whiskers', 'Cat', 3, 'Vaccinated and neutered');
INSERT INTO pets (name, species, age, health_info) VALUES ('Rocky', 'Hamster', 1, 'Loves running in his wheel');
INSERT INTO pets (name, species, age, health_info) VALUES ('Nemo', 'Fish', 2, 'Requires a heated tank');
INSERT INTO pets (name, species, age, health_info) VALUES ('Luna', 'Rabbit', 4, 'Likes fresh vegetables');
INSERT INTO pets (name, species, age, health_info) VALUES ('Simba', 'Lion', 6, 'King of the jungle');
INSERT INTO pets (name, species, age, health_info) VALUES ('Kiara', 'Turtle', 10, 'Enjoys basking in the sun');
INSERT INTO pets (name, species, age, health_info) VALUES ('Fluffy', 'Guinea Pig', 2, 'Needs hay and vegetables');
INSERT INTO pets (name, species, age, health_info) VALUES ('Max', 'Parrot', 8, 'Can mimic human speech');
INSERT INTO pets (name, species, age, health_info) VALUES ('Coco', 'Horse', 7, 'Requires regular grooming and exercise');