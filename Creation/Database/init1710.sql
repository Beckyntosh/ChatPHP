CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
species VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP
);

INSERT INTO pet_profiles (name, species, health_info) VALUES ('Buddy', 'Dog', 'Healthy and active');
INSERT INTO pet_profiles (name, species, health_info) VALUES ('Whiskers', 'Cat', 'Indoor-only and loves treats');
INSERT INTO pet_profiles (name, species, health_info) VALUES ('Max', 'Dog', 'Likes long walks and playing fetch');
INSERT INTO pet_profiles (name, species, health_info) VALUES ('Fluffy', 'Rabbit', 'Enjoys fresh vegetables and hay');
INSERT INTO pet_profiles (name, species, health_info) VALUES ('Felix', 'Cat', 'Likes to nap in sunspots');
INSERT INTO pet_profiles (name, species, health_info) VALUES ('Rocky', 'Hamster', 'Loves running on its wheel');
INSERT INTO pet_profiles (name, species, health_info) VALUES ('Charlie', 'Dog', 'Very friendly and good with kids');
INSERT INTO pet_profiles (name, species, health_info) VALUES ('Snowball', 'Rabbit', 'Loves to dig and explore');
INSERT INTO pet_profiles (name, species, health_info) VALUES ('Mittens', 'Cat', 'Enjoys cuddling and being brushed');
INSERT INTO pet_profiles (name, species, health_info) VALUES ('Coco', 'Dog', 'Fun-loving and always up for a game');
