CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    UNIQUE(email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS browsing_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
