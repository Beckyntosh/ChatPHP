CREATE TABLE IF NOT EXISTS courses (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255));
CREATE TABLE IF NOT EXISTS products (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255), description TEXT, category VARCHAR(100), price DECIMAL(10, 2), stock_quantity INT);
CREATE TABLE IF NOT EXISTS users (id INT AUTO_INCREMENT PRIMARY KEY, username VARCHAR(30), name VARCHAR(30), email VARCHAR(50), password VARCHAR(255));
CREATE TABLE IF NOT EXISTS uploads (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(100), mimetype VARCHAR(100), data LONGBLOB);

INSERT INTO courses (name) VALUES ('Course 1');
INSERT INTO courses (name) VALUES ('Course 2');
INSERT INTO courses (name) VALUES ('Course 3');
INSERT INTO courses (name) VALUES ('Course 4');
INSERT INTO courses (name) VALUES ('Course 5');
INSERT INTO courses (name) VALUES ('Course 6');
INSERT INTO courses (name) VALUES ('Course 7');
INSERT INTO courses (name) VALUES ('Course 8');
INSERT INTO courses (name) VALUES ('Course 9');
INSERT INTO courses (name) VALUES ('Course 10');
