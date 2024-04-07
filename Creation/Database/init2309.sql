CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50),
joined_loyalty_program BOOLEAN DEFAULT 0,
reg_date TIMESTAMP
);

INSERT INTO users (username, password, email, joined_loyalty_program) VALUES ('JohnDoe', 'password123', 'johndoe@example.com', 1);
INSERT INTO users (username, password, email, joined_loyalty_program) VALUES ('JaneSmith', 'letmein', 'janesmith@example.com', 0);
INSERT INTO users (username, password, email, joined_loyalty_program) VALUES ('AliceBrown', 'securepwd', 'alicebrown@example.com', 1);
INSERT INTO users (username, password, email, joined_loyalty_program) VALUES ('BobWhite', 'qwerty', 'bobwhite@example.com', 0);
INSERT INTO users (username, password, email, joined_loyalty_program) VALUES ('EveGreen', 'password1234', 'evegreen@example.com', 1);
INSERT INTO users (username, password, email, joined_loyalty_program) VALUES ('MarkBlack', 'p@ssw0rd', 'markblack@example.com', 0);
INSERT INTO users (username, password, email, joined_loyalty_program) VALUES ('SarahGray', 'letmein321', 'sarahgray@example.com', 1);
INSERT INTO users (username, password, email, joined_loyalty_program) VALUES ('TomRed', 'ilovecoding', 'tomred@example.com', 0);
INSERT INTO users (username, password, email, joined_loyalty_program) VALUES ('EmilyOrange', 'secure123', 'emilyorange@example.com', 1);
INSERT INTO users (username, password, email, joined_loyalty_program) VALUES ('AndrewPurple', 'password321', 'andrewpurple@example.com', 0);