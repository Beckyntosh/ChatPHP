CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS browsing_history (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
product_id INT(6) UNSIGNED,
FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
genre VARCHAR(30) NOT NULL
);

INSERT INTO products (name, genre) VALUES ('Minecraft', 'Sandbox');
INSERT INTO products (name, genre) VALUES ('Call of Duty', 'Shooter');
INSERT INTO products (name, genre) VALUES ('The Witcher 3', 'RPG');
INSERT INTO products (name, genre) VALUES ('FIFA 2021', 'Sports');
INSERT INTO products (name, genre) VALUES ('Super Mario Odyssey', 'Platformer');
INSERT INTO products (name, genre) VALUES ('Red Dead Redemption 2', 'Action-Adventure');
INSERT INTO products (name, genre) VALUES ('Overwatch', 'FPS');
INSERT INTO products (name, genre) VALUES ('Animal Crossing: New Horizons', 'Life Simulation');
INSERT INTO products (name, genre) VALUES ('League of Legends', 'MOBA');
INSERT INTO products (name, genre) VALUES ('Assassin\'s Creed Valhalla', 'Action-Adventure');
