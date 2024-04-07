CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES ('john_doe', 'john.doe@example.com', 'password1');
INSERT INTO users (username, email, password) VALUES ('jane_smith', 'jane.smith@example.com', 'password2');
INSERT INTO users (username, email, password) VALUES ('mike_jackson', 'mike.jackson@example.com', 'password3');
INSERT INTO users (username, email, password) VALUES ('sara_brown', 'sara.brown@example.com', 'password4');
INSERT INTO users (username, email, password) VALUES ('chris_green', 'chris.green@example.com', 'password5');
INSERT INTO users (username, email, password) VALUES ('emma_taylor', 'emma.taylor@example.com', 'password6');
INSERT INTO users (username, email, password) VALUES ('adam_wilson', 'adam.wilson@example.com', 'password7');
INSERT INTO users (username, email, password) VALUES ('lisa_adams', 'lisa.adams@example.com', 'password8');
INSERT INTO users (username, email, password) VALUES ('kevin_miller', 'kevin.miller@example.com', 'password9');
INSERT INTO users (username, email, password) VALUES ('julie_carter', 'julie.carter@example.com', 'password10');
