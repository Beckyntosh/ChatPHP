CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL
);

INSERT INTO users (username, email) VALUES ('JohnDoe', 'john.doe@example.com');
INSERT INTO users (username, email) VALUES ('JaneSmith', 'jane.smith@example.com');
INSERT INTO users (username, email) VALUES ('AliceBrown', 'alice.brown@example.com');
INSERT INTO users (username, email) VALUES ('BobJohnson', 'bob.johnson@example.com');
INSERT INTO users (username, email) VALUES ('SarahLee', 'sarah.lee@example.com');
INSERT INTO users (username, email) VALUES ('MichaelDavis', 'michael.davis@example.com');
INSERT INTO users (username, email) VALUES ('EmilyMiller', 'emily.miller@example.com');
INSERT INTO users (username, email) VALUES ('DavidWilson', 'david.wilson@example.com');
INSERT INTO users (username, email) VALUES ('OliviaMartinez', 'olivia.martinez@example.com');
INSERT INTO users (username, email) VALUES ('JamesTaylor', 'james.taylor@example.com');

INSERT INTO user_social_accounts (user_id, social_media, social_id) VALUES (1, 'Facebook', '123456');
INSERT INTO user_social_accounts (user_id, social_media, social_id) VALUES (2, 'Twitter', '789012');
INSERT INTO user_social_accounts (user_id, social_media, social_id) VALUES (3, 'Instagram', '345678');
INSERT INTO user_social_accounts (user_id, social_media, social_id) VALUES (4, 'Snapchat', '901234');
INSERT INTO user_social_accounts (user_id, social_media, social_id) VALUES (5, 'LinkedIn', '567890');
INSERT INTO user_social_accounts (user_id, social_media, social_id) VALUES (6, 'Pinterest', '123456');
INSERT INTO user_social_accounts (user_id, social_media, social_id) VALUES (7, 'TikTok', '789012');
INSERT INTO user_social_accounts (user_id, social_media, social_id) VALUES (8, 'YouTube', '345678');
INSERT INTO user_social_accounts (user_id, social_media, social_id) VALUES (9, 'Reddit', '901234');
INSERT INTO user_social_accounts (user_id, social_media, social_id) VALUES (10, 'WhatsApp', '567890');
