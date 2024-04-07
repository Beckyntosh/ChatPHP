CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(100) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (username, password, email) VALUES ('john_doe', 'hashed_password_1', 'john_doe@example.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', 'hashed_password_2', 'jane_smith@example.com');
INSERT INTO users (username, password, email) VALUES ('bob_jackson', 'hashed_password_3', 'bob_jackson@example.com');
INSERT INTO users (username, password, email) VALUES ('alice_johnson', 'hashed_password_4', 'alice_johnson@example.com');
INSERT INTO users (username, password, email) VALUES ('sam_williams', 'hashed_password_5', 'sam_williams@example.com');
INSERT INTO users (username, password, email) VALUES ('sara_miller', 'hashed_password_6', 'sara_miller@example.com');
INSERT INTO users (username, password, email) VALUES ('mike_brown', 'hashed_password_7', 'mike_brown@example.com');
INSERT INTO users (username, password, email) VALUES ('linda_lee', 'hashed_password_8', 'linda_lee@example.com');
INSERT INTO users (username, password, email) VALUES ('steve_roberts', 'hashed_password_9', 'steve_roberts@example.com');
INSERT INTO users (username, password, email) VALUES ('emily_clark', 'hashed_password_10', 'emily_clark@example.com');
