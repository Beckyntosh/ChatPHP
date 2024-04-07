CREATE TABLE IF NOT EXISTS PetProfiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
species VARCHAR(30) NOT NULL,
breed VARCHAR(30),
age INT(3),
health_info TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO PetProfiles (name, species, breed, age, health_info) VALUES ('Buddy', 'Dog', 'Labrador Retriever', 5, 'No health issues');
INSERT INTO PetProfiles (name, species, breed, age, health_info) VALUES ('Whiskers', 'Cat', 'Siamese', 3, 'Indoor cat, no known health issues');
INSERT INTO PetProfiles (name, species, breed, age, health_info) VALUES ('Max', 'Dog', 'Golden Retriever', 8, 'Sensitive stomach, needs special diet');
INSERT INTO PetProfiles (name, species, breed, age, health_info) VALUES ('Nibbles', 'Hamster', 'Syrian', 1, 'Loves running on wheel, healthy diet of seeds and vegetables');
INSERT INTO PetProfiles (name, species, breed, age, health_info) VALUES ('Fluffy', 'Rabbit', 'Lionhead', 2, 'House rabbit, litter trained, regular vet checkups');
INSERT INTO PetProfiles (name, species, breed, age, health_info) VALUES ('Whiskers', 'Guinea Pig', 'Abyssinian', 1, 'Social, loves fresh veggies and hay');
INSERT INTO PetProfiles (name, species, breed, age, health_info) VALUES ('Spike', 'Hedgehog', 'African Pygmy', 4, 'Nocturnal, varied diet of insects and fruits');
INSERT INTO PetProfiles (name, species, breed, age, health_info) VALUES ('Snowball', 'Mouse', 'White', 1, 'Pet mouse, friendly, enjoys exploring in cage');
INSERT INTO PetProfiles (name, species, breed, age, health_info) VALUES ('Whiskers', 'Rat', 'Dumbo', 1, 'Sociable, loves climbing and playing with toys');
INSERT INTO PetProfiles (name, species, breed, age, health_info) VALUES ('Beaky', 'Bird', 'Cockatiel', 5, 'Whistles tunes, enjoys fresh fruits and veggies');
