CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO users (username, email) VALUES ('JohnDoe', 'john.doe@example.com');
INSERT INTO users (username, email) VALUES ('JaneSmith', 'jane.smith@example.com');
INSERT INTO users (username, email) VALUES ('Alice123', 'alice123@example.com');
INSERT INTO users (username, email) VALUES ('Bob456', 'bob456@example.com');
INSERT INTO users (username, email) VALUES ('Eve789', 'eve789@example.com');
INSERT INTO users (username, email) VALUES ('CharlieXYZ', 'charlie.xyz@example.com');
INSERT INTO users (username, email) VALUES ('SarahM', 'sarah.m@example.com');
INSERT INTO users (username, email) VALUES ('David87', 'david87@example.com');
INSERT INTO users (username, email) VALUES ('EmilyK', 'emily.k@example.com');
INSERT INTO users (username, email) VALUES ('MichaelP', 'michael.p@example.com');
