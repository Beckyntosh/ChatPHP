CREATE TABLE pets (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    health_info TEXT,
    reg_date TIMESTAMP
);

INSERT INTO pets (name, health_info) VALUES ('Buddy', 'Active and playful');
INSERT INTO pets (name, health_info) VALUES ('Max', 'Requires regular walks');
INSERT INTO pets (name, health_info) VALUES ('Luna', 'Loves belly rubs');
INSERT INTO pets (name, health_info) VALUES ('Charlie', 'Needs a balanced diet');
INSERT INTO pets (name, health_info) VALUES ('Daisy', 'Prefers outdoor activities');
INSERT INTO pets (name, health_info) VALUES ('Rocky', 'Enjoys fetch games');
INSERT INTO pets (name, health_info) VALUES ('Molly', 'Sensitive to loud noises');
INSERT INTO pets (name, health_info) VALUES ('Bella', 'Likes to socialize with other pets');
INSERT INTO pets (name, health_info) VALUES ('Cooper', 'Requires regular grooming');
INSERT INTO pets (name, health_info) VALUES ('Bailey', 'Needs regular check-ups at the vet');