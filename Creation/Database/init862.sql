CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS plugins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    file_name VARCHAR(100) NOT NULL
);

INSERT INTO users (name, email) VALUES ('John Doe', 'johndoe@example.com');
INSERT INTO users (name, email) VALUES ('Jane Smith', 'janesmith@example.com');
INSERT INTO users (name, email) VALUES ('Alice Brown', 'alicebrown@example.com');
INSERT INTO users (name, email) VALUES ('Bob White', 'bobwhite@example.com');
INSERT INTO users (name, email) VALUES ('Eve Johnson', 'evejohnson@example.com');
INSERT INTO users (name, email) VALUES ('Michael Lee', 'michaellee@example.com');
INSERT INTO users (name, email) VALUES ('Sarah Davis', 'sarahdavis@example.com');
INSERT INTO users (name, email) VALUES ('Chris Martinez', 'chrismartinez@example.com');
INSERT INTO users (name, email) VALUES ('Emily Rodriguez', 'emilyrodriguez@example.com');
INSERT INTO users (name, email) VALUES ('David Taylor', 'davidtaylor@example.com');

INSERT INTO plugins (name, file_name) VALUES ('Plugin 1', 'plugin1.php');
INSERT INTO plugins (name, file_name) VALUES ('Plugin 2', 'plugin2.php');
INSERT INTO plugins (name, file_name) VALUES ('Plugin 3', 'plugin3.php');
INSERT INTO plugins (name, file_name) VALUES ('Plugin 4', 'plugin4.php');
INSERT INTO plugins (name, file_name) VALUES ('Plugin 5', 'plugin5.php');
INSERT INTO plugins (name, file_name) VALUES ('Plugin 6', 'plugin6.php');
INSERT INTO plugins (name, file_name) VALUES ('Plugin 7', 'plugin7.php');
INSERT INTO plugins (name, file_name) VALUES ('Plugin 8', 'plugin8.php');
INSERT INTO plugins (name, file_name) VALUES ('Plugin 9', 'plugin9.php');
INSERT INTO plugins (name, file_name) VALUES ('Plugin 10', 'plugin10.php');