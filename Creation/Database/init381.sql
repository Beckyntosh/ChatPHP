CREATE TABLE IF NOT EXISTS users (
             id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
             username VARCHAR(30) NOT NULL,
             password VARCHAR(40) NOT NULL,
             email VARCHAR(50),
             reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (username, password, email) VALUES ('john_doe', 'password123', 'john.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', 'qwerty789', 'jane.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('alice_wonder', 'pass123word', 'alice.wonder@example.com');
INSERT INTO users (username, password, email) VALUES ('bob_jackson', 'abcde456', 'bob.jackson@example.com');
INSERT INTO users (username, password, email) VALUES ('sara_davis', 'sara_pass', 'sara.davis@example.com');
INSERT INTO users (username, password, email) VALUES ('mike_williams', 'mike1234', 'mike.williams@example.com');
INSERT INTO users (username, password, email) VALUES ('emily_brown', 'emily7890', 'emily.brown@example.com');
INSERT INTO users (username, password, email) VALUES ('sam_roberts', 'sam_pass', 'sam.roberts@example.com');
INSERT INTO users (username, password, email) VALUES ('laura_white', 'laura_pass123', 'laura.white@example.com');
INSERT INTO users (username, password, email) VALUES ('chris_evans', 'chris456', 'chris.evans@example.com');
