CREATE TABLE IF NOT EXISTS cart (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) NOT NULL,
    product_details VARCHAR(255) NOT NULL,
    saved_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE
);

INSERT INTO users (username) VALUES ('john_doe');
INSERT INTO users (username) VALUES ('jane_smith');
INSERT INTO users (username) VALUES ('alice_garcia');
INSERT INTO users (username) VALUES ('bob_jackson');
INSERT INTO users (username) VALUES ('emily_white');
INSERT INTO users (username) VALUES ('michael_brown');
INSERT INTO users (username) VALUES ('sarah_miller');
INSERT INTO users (username) VALUES ('alex_martin');
INSERT INTO users (username) VALUES ('olivia_taylor');
INSERT INTO users (username) VALUES ('william_clark');