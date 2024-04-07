CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    profile_pic VARCHAR(100),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS audit_trail (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    action VARCHAR(50),
    description TEXT,
    performed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, profile_pic) VALUES ('JohnDoe', 'john_profile.jpg');
INSERT INTO users (username, profile_pic) VALUES ('JaneSmith', 'jane_profile.jpg');
INSERT INTO users (username, profile_pic) VALUES ('AliceJones', 'alice_profile.jpg');
INSERT INTO users (username, profile_pic) VALUES ('BobBrown', 'bob_profile.jpg');
INSERT INTO users (username, profile_pic) VALUES ('EveWhite', 'eve_profile.jpg');
INSERT INTO users (username, profile_pic) VALUES ('MichaelGreen', 'michael_profile.jpg');
INSERT INTO users (username, profile_pic) VALUES ('SarahDavis', 'sarah_profile.jpg');
INSERT INTO users (username, profile_pic) VALUES ('RyanWilson', 'ryan_profile.jpg');
INSERT INTO users (username, profile_pic) VALUES ('OliviaTaylor', 'olivia_profile.jpg');
INSERT INTO users (username, profile_pic) VALUES ('DavidAnderson', 'david_profile.jpg');
