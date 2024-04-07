CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    preferred_language VARCHAR(50) NOT NULL
);

INSERT INTO users (username, preferred_language) VALUES ('JohnDoe', 'English');
INSERT INTO users (username, preferred_language) VALUES ('JaneSmith', 'Spanish');
INSERT INTO users (username, preferred_language) VALUES ('AliceBrown', 'French');
INSERT INTO users (username, preferred_language) VALUES ('BobWhite', 'German');
INSERT INTO users (username, preferred_language) VALUES ('SarahJohnson', 'English');
INSERT INTO users (username, preferred_language) VALUES ('MichaelLee', 'Spanish');
INSERT INTO users (username, preferred_language) VALUES ('EmilyDavis', 'French');
INSERT INTO users (username, preferred_language) VALUES ('JamesWilson', 'German');
INSERT INTO users (username, preferred_language) VALUES ('OliviaClark', 'English');
INSERT INTO users (username, preferred_language) VALUES ('DanielYoung', 'Spanish');