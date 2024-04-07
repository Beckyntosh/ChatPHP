CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (username, password, email) VALUES ('JohnDoe', 'pass123', 'johndoe@example.com');
INSERT INTO users (username, password, email) VALUES ('JaneSmith', 'hello456', 'janesmith@example.com');
INSERT INTO users (username, password, email) VALUES ('AliceJones', 'p@ssw0rd', 'alicejones@example.com');
INSERT INTO users (username, password, email) VALUES ('BobBrown', 'secret321', 'bobbrown@example.com');
INSERT INTO users (username, password, email) VALUES ('EmmaWhite', 'pa55w0rd', 'emmawhite@example.com');
INSERT INTO users (username, password, email) VALUES ('MichaelDavis', 'qwerty', 'michaeldavis@example.com');
INSERT INTO users (username, password, email) VALUES ('SarahLee', 'ilovecats', 'sarahlee@example.com');
INSERT INTO users (username, password, email) VALUES ('RyanJohnson', 'letmein', 'ryanjohnson@example.com');
INSERT INTO users (username, password, email) VALUES ('OliviaBrown', '987654', 'oliviabrown@example.com');
INSERT INTO users (username, password, email) VALUES ('WilliamSmith', 'password123', 'williamsmith@example.com');
