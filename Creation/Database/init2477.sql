CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS appointments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
appointment_date DATETIME NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (fullname, email, password) VALUES ('John Doe', 'johndoe@example.com', 'password1');
INSERT INTO users (fullname, email, password) VALUES ('Jane Smith', 'janesmith@example.com', 'password2');
INSERT INTO users (fullname, email, password) VALUES ('Alice Johnson', 'alicejohnson@example.com', 'password3');
INSERT INTO users (fullname, email, password) VALUES ('Bob Brown', 'bobbrown@example.com', 'password4');
INSERT INTO users (fullname, email, password) VALUES ('Emma Davis', 'emmadavis@example.com', 'password5');
INSERT INTO users (fullname, email, password) VALUES ('Michael Wilson', 'michaelwilson@example.com', 'password6');
INSERT INTO users (fullname, email, password) VALUES ('Sarah Anderson', 'sarahanderson@example.com', 'password7');
INSERT INTO users (fullname, email, password) VALUES ('David Martinez', 'davidmartinez@example.com', 'password8');
INSERT INTO users (fullname, email, password) VALUES ('Laura Thompson', 'laurathompson@example.com', 'password9');
INSERT INTO users (fullname, email, password) VALUES ('Chris Roberts', 'chrisroberts@example.com', 'password10');
