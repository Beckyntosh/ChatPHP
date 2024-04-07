CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);

INSERT INTO users (username, email, password) VALUES ('john_doe', 'john.doe@gmail.com', 'password123');
INSERT INTO users (username, email, password) VALUES ('jane_smith', 'jane.smith@yahoo.com', 'hello456');
INSERT INTO users (username, email, password) VALUES ('mary_jones', 'mary.jones@hotmail.com', 'pass1234');
INSERT INTO users (username, email, password) VALUES ('mark_jackson', 'mark.jackson@gmail.com', 'secret789');
INSERT INTO users (username, email, password) VALUES ('susan_wilson', 'susan.wilson@yahoo.com', 'p@ssw0rd');
INSERT INTO users (username, email, password) VALUES ('chris_evans', 'chris.evans@hotmail.com', 'captain@123');
INSERT INTO users (username, email, password) VALUES ('emily_davis', 'emily.davis@gmail.com', 'coolpassword');
INSERT INTO users (username, email, password) VALUES ('adam_smith', 'adam.smith@yahoo.com', 'password123');
INSERT INTO users (username, email, password) VALUES ('lisa_miller', 'lisa.miller@hotmail.com', '12345678');
INSERT INTO users (username, email, password) VALUES ('ryan_baker', 'ryan.baker@gmail.com', 'bakery@456');
