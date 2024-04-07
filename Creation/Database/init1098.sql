CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE pet_supplies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product VARCHAR(255) NOT NULL,
    style VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('john_doe', 'password123');
INSERT INTO users (username, password) VALUES ('jane_smith', 'qwerty456');
INSERT INTO users (username, password) VALUES ('admin_user', 'securepass');

INSERT INTO pet_supplies (product, style) VALUES ('Dog Food', 'happy');
INSERT INTO pet_supplies (product, style) VALUES ('Cat Toys', 'bright');
INSERT INTO pet_supplies (product, style) VALUES ('Bird Cage', 'colorful');
INSERT INTO pet_supplies (product, style) VALUES ('Fish Tank', 'serene');
INSERT INTO pet_supplies (product, style) VALUES ('Hamster Wheel', 'playful');
INSERT INTO pet_supplies (product, style) VALUES ('Rabbit Hutch', 'cozy');
INSERT INTO pet_supplies (product, style) VALUES ('Pet Bed', 'comfy');
INSERT INTO pet_supplies (product, style) VALUES ('Collar and Leash', 'stylish');
INSERT INTO pet_supplies (product, style) VALUES ('Grooming Kit', 'clean');
INSERT INTO pet_supplies (product, style) VALUES ('Fish Food', 'colorful');
