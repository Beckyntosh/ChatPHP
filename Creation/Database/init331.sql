CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
profile_picture VARCHAR(100),
reg_date TIMESTAMP
);

INSERT INTO users (username, profile_picture) VALUES ('Alice', 'uploads/alice.jpg');
INSERT INTO users (username, profile_picture) VALUES ('Bob', 'uploads/bob.png');
INSERT INTO users (username, profile_picture) VALUES ('Charlie', 'uploads/charlie.jpg');
INSERT INTO users (username, profile_picture) VALUES ('David', 'uploads/david.png');
INSERT INTO users (username, profile_picture) VALUES ('Eve', 'uploads/eve.jpg');
INSERT INTO users (username, profile_picture) VALUES ('Frank', 'uploads/frank.png');
INSERT INTO users (username, profile_picture) VALUES ('Grace', 'uploads/grace.jpg');
INSERT INTO users (username, profile_picture) VALUES ('Harry', 'uploads/harry.png');
INSERT INTO users (username, profile_picture) VALUES ('Ivy', 'uploads/ivy.jpg');
INSERT INTO users (username, profile_picture) VALUES ('Jack', 'uploads/jack.png');
