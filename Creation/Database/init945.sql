CREATE TABLE IF NOT EXISTS users (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    hash VARCHAR(255) NOT NULL,
    UNIQUE (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Insert data into users table
INSERT INTO users (username, hash) VALUES ('alice', 'hashed_password_1');
INSERT INTO users (username, hash) VALUES ('bob', 'hashed_password_2');
INSERT INTO users (username, hash) VALUES ('charlie', 'hashed_password_3');
INSERT INTO users (username, hash) VALUES ('david', 'hashed_password_4');
INSERT INTO users (username, hash) VALUES ('emma', 'hashed_password_5');
INSERT INTO users (username, hash) VALUES ('frank', 'hashed_password_6');
INSERT INTO users (username, hash) VALUES ('grace', 'hashed_password_7');
INSERT INTO users (username, hash) VALUES ('henry', 'hashed_password_8');
INSERT INTO users (username, hash) VALUES ('isabel', 'hashed_password_9');
INSERT INTO users (username, hash) VALUES ('jacob', 'hashed_password_10');
