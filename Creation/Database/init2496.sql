CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(60) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO users (username, password, email) VALUES ('JohnDoe', 'password1', 'john.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('JaneSmith', 'password2', 'jane.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('AliceBrown', 'password3', 'alice.brown@example.com');
INSERT INTO users (username, password, email) VALUES ('BobWhite', 'password4', 'bob.white@example.com');
INSERT INTO users (username, password, email) VALUES ('EveTaylor', 'password5', 'eve.taylor@example.com');
INSERT INTO users (username, password, email) VALUES ('MikeJohnson', 'password6', 'mike.johnson@example.com');
INSERT INTO users (username, password, email) VALUES ('SarahLee', 'password7', 'sarah.lee@example.com');
INSERT INTO users (username, password, email) VALUES ('KevinClark', 'password8', 'kevin.clark@example.com');
INSERT INTO users (username, password, email) VALUES ('EmilyDavis', 'password9', 'emily.davis@example.com');
INSERT INTO users (username, password, email) VALUES ('SamuelGarcia', 'password10', 'samuel.garcia@example.com');
