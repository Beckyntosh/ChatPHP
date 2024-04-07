CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50),
    password VARCHAR(50),
    facebook_id VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS social_links (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    social_id VARCHAR(255),
    type VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (email, password, facebook_id) VALUES ('user1@example.com', 'password1', '1234567890');
INSERT INTO users (email, password, facebook_id) VALUES ('user2@example.com', 'password2', NULL);
INSERT INTO users (email, password, facebook_id) VALUES ('user3@example.com', 'password3', '0987654321');
INSERT INTO users (email, password, facebook_id) VALUES ('user4@example.com', 'password4', NULL);
INSERT INTO users (email, password, facebook_id) VALUES ('user5@example.com', 'password5', '5432109876');
INSERT INTO users (email, password, facebook_id) VALUES ('user6@example.com', 'password6', NULL);
INSERT INTO users (email, password, facebook_id) VALUES ('user7@example.com', 'password7', '1357924680');
INSERT INTO users (email, password, facebook_id) VALUES ('user8@example.com', 'password8', NULL);
INSERT INTO users (email, password, facebook_id) VALUES ('user9@example.com', 'password9', '6543210987');
INSERT INTO users (email, password, facebook_id) VALUES ('user10@example.com', 'password10', NULL);
