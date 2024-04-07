CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES ('john_doe', 'john.doe@example.com', 'hashed_password_1');
INSERT INTO users (username, email, password) VALUES ('jane_smith', 'jane.smith@example.com', 'hashed_password_2');
INSERT INTO users (username, email, password) VALUES ('carl_johnson', 'carl.johnson@example.com', 'hashed_password_3');
INSERT INTO users (username, email, password) VALUES ('sarah_parker', 'sarah.parker@example.com', 'hashed_password_4');
INSERT INTO users (username, email, password) VALUES ('michael_jackson', 'michael.jackson@example.com', 'hashed_password_5');
INSERT INTO users (username, email, password) VALUES ('emily_rose', 'emily.rose@example.com', 'hashed_password_6');
INSERT INTO users (username, email, password) VALUES ('adam_scott', 'adam.scott@example.com', 'hashed_password_7');
INSERT INTO users (username, email, password) VALUES ('lisa_anderson', 'lisa.anderson@example.com', 'hashed_password_8');
INSERT INTO users (username, email, password) VALUES ('peter_green', 'peter.green@example.com', 'hashed_password_9');
INSERT INTO users (username, email, password) VALUES ('olivia_martin', 'olivia.martin@example.com', 'hashed_password_10');
