CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    preferences VARCHAR(255),
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    category VARCHAR(50),
    interest_level INT(1),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, password, preferences) VALUES ('JohnDoe', 'password123', '{"cardio","strength"}');
INSERT INTO users (username, password, preferences) VALUES ('JaneSmith', 'abc123', '{"wellness"}');
INSERT INTO users (username, password, preferences) VALUES ('AliceJones', 'pass1234', '{"strength","wellness"}');
INSERT INTO users (username, password, preferences) VALUES ('BobWilliams', 'test456', '{"cardio"}');
INSERT INTO users (username, password, preferences) VALUES ('EmilyBrown', 'secret789', '{"cardio","strength","wellness"}');
INSERT INTO users (username, password, preferences) VALUES ('DavidDavis', 'letmein', '{"strength"}');
INSERT INTO users (username, password, preferences) VALUES ('SarahTaylor', 'qwerty', '{"cardio","wellness"}');
INSERT INTO users (username, password, preferences) VALUES ('MichaelGreen', 'password', '{"strength"}');
INSERT INTO users (username, password, preferences) VALUES ('RachelMiller', 'hello123', '{"cardio","strength"}');
INSERT INTO users (username, password, preferences) VALUES ('ThomasWilson', 'welcome', '{"cardio","strength","wellness"}');