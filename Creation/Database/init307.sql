CREATE TABLE IF NOT EXISTS user_profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    profile_pic VARCHAR(255) NOT NULL,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS audit_trail (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    action VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    action_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES user_profiles(id)
);

INSERT INTO user_profiles (username, profile_pic) VALUES ('JohnDoe', 'profilepic1.jpg');
INSERT INTO user_profiles (username, profile_pic) VALUES ('JaneSmith', 'profilepic2.jpg');
INSERT INTO user_profiles (username, profile_pic) VALUES ('AliceBrown', 'profilepic3.jpg');
INSERT INTO user_profiles (username, profile_pic) VALUES ('BobJohnson', 'profilepic4.jpg');
INSERT INTO user_profiles (username, profile_pic) VALUES ('EmilyDavis', 'profilepic5.jpg');
INSERT INTO user_profiles (username, profile_pic) VALUES ('MikeWilson', 'profilepic6.jpg');
INSERT INTO user_profiles (username, profile_pic) VALUES ('SarahLee', 'profilepic7.jpg');
INSERT INTO user_profiles (username, profile_pic) VALUES ('AlexGarcia', 'profilepic8.jpg');
INSERT INTO user_profiles (username, profile_pic) VALUES ('OliviaMartinez', 'profilepic9.jpg');
INSERT INTO user_profiles (username, profile_pic) VALUES ('ChrisNguyen', 'profilepic10.jpg');
