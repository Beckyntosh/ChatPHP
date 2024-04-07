CREATE TABLE IF NOT EXISTS users (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30),
name VARCHAR(30),
email VARCHAR(50),
password VARCHAR(255)
);

INSERT INTO users (username, name, email, password) VALUES ('john_doe', 'John Doe', 'john@example.com', 'password123');
INSERT INTO users (username, name, email, password) VALUES ('jane_smith', 'Jane Smith', 'jane@example.com', 'pass321word');
INSERT INTO users (username, name, email, password) VALUES ('mark_miller', 'Mark Miller', 'mark@example.com', 'millerpass');
INSERT INTO users (username, name, email, password) VALUES ('sara_jones', 'Sara Jones', 'sara@example.com', 'p@ssword');
INSERT INTO users (username, name, email, password) VALUES ('adam_brown', 'Adam Brown', 'adam@example.com', 'password2020');
INSERT INTO users (username, name, email, password) VALUES ('emily_white', 'Emily White', 'emily@example.com', 'white123');
INSERT INTO users (username, name, email, password) VALUES ('michael_watson', 'Michael Watson', 'michael@example.com', 'watsonpass');
INSERT INTO users (username, name, email, password) VALUES ('laura_hall', 'Laura Hall', 'laura@example.com', 'hallpass123');
INSERT INTO users (username, name, email, password) VALUES ('steve_clark', 'Steve Clark', 'steve@example.com', 'clarkpass321');
INSERT INTO users (username, name, email, password) VALUES ('amy_adams', 'Amy Adams', 'amy@example.com', 'adams2020');
