CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    isActive BOOLEAN DEFAULT true,
    reg_date TIMESTAMP
);

INSERT INTO users (email, password, isActive, reg_date) VALUES ('user1@example.com', 'password1', 1, NOW());
INSERT INTO users (email, password, isActive, reg_date) VALUES ('user2@example.com', 'password2', 1, NOW());
INSERT INTO users (email, password, isActive, reg_date) VALUES ('user3@example.com', 'password3', 1, NOW());
INSERT INTO users (email, password, isActive, reg_date) VALUES ('user4@example.com', 'password4', 1, NOW());
INSERT INTO users (email, password, isActive, reg_date) VALUES ('user5@example.com', 'password5', 1, NOW());
INSERT INTO users (email, password, isActive, reg_date) VALUES ('user6@example.com', 'password6', 1, NOW());
INSERT INTO users (email, password, isActive, reg_date) VALUES ('user7@example.com', 'password7', 1, NOW());
INSERT INTO users (email, password, isActive, reg_date) VALUES ('user8@example.com', 'password8', 1, NOW());
INSERT INTO users (email, password, isActive, reg_date) VALUES ('user9@example.com', 'password9', 1, NOW());
INSERT INTO users (email, password, isActive, reg_date) VALUES ('user10@example.com', 'password10', 1, NOW());
