CREATE TABLE IF NOT EXISTS pets (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
type VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP
);

INSERT INTO pets (name, type, health_info) VALUES ('Buddy', 'Dog', 'Healthy and active');
INSERT INTO pets (name, type, health_info) VALUES ('Whiskers', 'Cat', 'Needs regular grooming');
INSERT INTO pets (name, type, health_info) VALUES ('Max', 'Dog', 'Has allergies');
INSERT INTO pets (name, type, health_info) VALUES ('Fluffy', 'Hamster', 'Energetic and playful');
INSERT INTO pets (name, type, health_info) VALUES ('Oreo', 'Cat', 'Likes being outdoors');
INSERT INTO pets (name, type, health_info) VALUES ('Rocky', 'Fish', 'Requires specific water conditions');
INSERT INTO pets (name, type, health_info) VALUES ('Luna', 'Dog', 'Loves long walks');
INSERT INTO pets (name, type, health_info) VALUES ('Coco', 'Rabbit', 'Needs a large cage');
INSERT INTO pets (name, type, health_info) VALUES ('Ziggy', 'Bird', 'Enjoys singing');
INSERT INTO pets (name, type, health_info) VALUES ('Shadow', 'Cat', 'Indoor cat');
