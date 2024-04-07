CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
);

INSERT INTO users (name, email) VALUES ('John Doe', 'johndoe@example.com');
INSERT INTO users (name, email) VALUES ('Jane Smith', 'janesmith@example.com');
INSERT INTO users (name, email) VALUES ('Mike Johnson', 'mikejohnson@example.com');
INSERT INTO users (name, email) VALUES ('Alice Brown', 'alicebrown@example.com');
INSERT INTO users (name, email) VALUES ('Sam Wilson', 'samwilson@example.com');
INSERT INTO users (name, email) VALUES ('Emily Davis', 'emilydavis@example.com');
INSERT INTO users (name, email) VALUES ('Alex Lee', 'alexlee@example.com');
INSERT INTO users (name, email) VALUES ('Sophia Martinez', 'sophiamartinez@example.com');
INSERT INTO users (name, email) VALUES ('Ryan Adams', 'ryanadams@example.com');
INSERT INTO users (name, email) VALUES ('Grace Clark', 'graceclark@example.com');