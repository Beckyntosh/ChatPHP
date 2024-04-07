CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO users (username, password) VALUES ('Alice', 'password1');
INSERT INTO users (username, password) VALUES ('Bob', 'password2');
INSERT INTO users (username, password) VALUES ('Charlie', 'password3');
INSERT INTO users (username, password) VALUES ('David', 'password4');
INSERT INTO users (username, password) VALUES ('Eve', 'password5');
INSERT INTO users (username, password) VALUES ('Fiona', 'password6');
INSERT INTO users (username, password) VALUES ('George', 'password7');
INSERT INTO users (username, password) VALUES ('Hannah', 'password8');
INSERT INTO users (username, password) VALUES ('Ian', 'password9');
INSERT INTO users (username, password) VALUES ('Jessica', 'password10');