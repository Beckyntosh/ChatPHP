CREATE TABLE IF NOT EXISTS pets (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(30) NOT NULL,
type VARCHAR(30) NOT NULL,
health_info VARCHAR(255),
reg_date TIMESTAMP
);

INSERT INTO pets (name, type, health_info) VALUES ('Buddy', 'Dog', 'Vaccinated, healthy, active');
INSERT INTO pets (name, type, health_info) VALUES ('Whiskers', 'Cat', 'Indoor, playful, needs regular grooming');
INSERT INTO pets (name, type, health_info) VALUES ('Rocky', 'Hamster', 'Small, quiet, needs exercise wheel');
INSERT INTO pets (name, type, health_info) VALUES ('Fluffy', 'Rabbit', 'Fluffy, friendly, enjoys fresh veggies');
INSERT INTO pets (name, type, health_info) VALUES ('Max', 'Dog', 'Big, protective, loves chew toys');
INSERT INTO pets (name, type, health_info) VALUES ('Mittens', 'Cat', 'Lazy, loves naps, dislikes baths');
INSERT INTO pets (name, type, health_info) VALUES ('Nibbles', 'Guinea Pig', 'Squeaky, loves hay, needs cozy hideout');
INSERT INTO pets (name, type, health_info) VALUES ('Bella', 'Bird', 'Colorful, chirpy, needs spacious cage');
INSERT INTO pets (name, type, health_info) VALUES ('Shadow', 'Snake', 'Slithery, low maintenance, eats mice');
INSERT INTO pets (name, type, health_info) VALUES ('Oreo', 'Ferret', 'Playful, loves tunnels, needs social interaction');
