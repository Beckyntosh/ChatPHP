CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS browsing_history (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    product_viewed VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS recommendations (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    recommended_product VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

INSERT INTO users (email) VALUES ('user1@example.com');
INSERT INTO users (email) VALUES ('user2@example.com');
INSERT INTO users (email) VALUES ('user3@example.com');
INSERT INTO users (email) VALUES ('user4@example.com');
INSERT INTO users (email) VALUES ('user5@example.com');
INSERT INTO users (email) VALUES ('user6@example.com');
INSERT INTO users (email) VALUES ('user7@example.com');
INSERT INTO users (email) VALUES ('user8@example.com');
INSERT INTO users (email) VALUES ('user9@example.com');
INSERT INTO users (email) VALUES ('user10@example.com');