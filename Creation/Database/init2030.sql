CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    profile_picture VARCHAR(255),
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS audit_trail (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    description VARCHAR(255),
    change_date TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, profile_picture, reg_date) VALUES ('Alice', 'image1.jpg', NOW());
INSERT INTO users (username, profile_picture, reg_date) VALUES ('Bob', 'image2.jpg', NOW());
INSERT INTO users (username, profile_picture, reg_date) VALUES ('Charlie', 'image3.jpg', NOW());
INSERT INTO users (username, profile_picture, reg_date) VALUES ('David', 'image4.jpg', NOW());
INSERT INTO users (username, profile_picture, reg_date) VALUES ('Eve', 'image5.jpg', NOW());
INSERT INTO users (username, profile_picture, reg_date) VALUES ('Frank', 'image6.jpg', NOW());
INSERT INTO users (username, profile_picture, reg_date) VALUES ('Grace', 'image7.jpg', NOW());
INSERT INTO users (username, profile_picture, reg_date) VALUES ('Hugo', 'image8.jpg', NOW());
INSERT INTO users (username, profile_picture, reg_date) VALUES ('Ivy', 'image9.jpg', NOW());
INSERT INTO users (username, profile_picture, reg_date) VALUES ('Jack', 'image10.jpg', NOW());
