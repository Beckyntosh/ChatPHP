CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS coupons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    code VARCHAR(10) NOT NULL,
    discount INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
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
