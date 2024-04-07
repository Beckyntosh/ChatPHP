CREATE TABLE IF NOT EXISTS pets (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
type VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP
);

INSERT INTO pets (name, type, health_info) VALUES ('Buddy', 'Dog', 'Regular check-ups needed');
INSERT INTO pets (name, type, health_info) VALUES ('Fluffy', 'Cat', 'Allergic to fish');
INSERT INTO pets (name, type, health_info) VALUES ('Rocky', 'Hamster', 'Needs a running wheel');
INSERT INTO pets (name, type, health_info) VALUES ('Max', 'Dog', 'Energetic and playful');
INSERT INTO pets (name, type, health_info) VALUES ('Whiskers', 'Cat', 'Likes to nap in the sun');
INSERT INTO pets (name, type, health_info) VALUES ('Cocoa', 'Rabbit', 'Requires fresh veggies daily');
INSERT INTO pets (name, type, health_info) VALUES ('Milo', 'Dog', 'Loves going for walks');
INSERT INTO pets (name, type, health_info) VALUES ('Snowball', 'Guinea Pig', 'Needs a spacious cage');
INSERT INTO pets (name, type, health_info) VALUES ('Spike', 'Hedgehog', 'Requires a heat lamp');
INSERT INTO pets (name, type, health_info) VALUES ('Luna', 'Cat', 'Indoor cat, with a preference for wet food');
