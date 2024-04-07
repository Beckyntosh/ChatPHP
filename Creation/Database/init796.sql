CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL
);

INSERT INTO users (name, username, password) VALUES ('John Doe', 'johndoe', 'password123');
INSERT INTO users (name, username, password) VALUES ('Jane Smith', 'janesmith', 'qwerty');
INSERT INTO users (name, username, password) VALUES ('Alice Johnson', 'alicej', 'pass123');
INSERT INTO users (name, username, password) VALUES ('Bob Brown', 'bobbrown', 'abc123');
INSERT INTO users (name, username, password) VALUES ('Sarah Wilson', 'sarahw', 'password456');
INSERT INTO users (name, username, password) VALUES ('Mike Davis', 'miked', 'letmein');
INSERT INTO users (name, username, password) VALUES ('Laura Lee', 'lauralee', 'password789');
INSERT INTO users (name, username, password) VALUES ('Tommy Green', 'tomgreen', 'green123');
INSERT INTO users (name, username, password) VALUES ('Emily White', 'emilyw', 'white456');
INSERT INTO users (name, username, password) VALUES ('Chris Black', 'chrisb', 'black123');