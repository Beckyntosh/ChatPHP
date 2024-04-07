CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
google_id VARCHAR(30) NOT NULL,
name VARCHAR(50),
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (google_id, name, email) VALUES ('12345', 'John Doe', 'johndoe@gmail.com');
INSERT INTO users (google_id, name, email) VALUES ('67890', 'Jane Smith', 'janesmith@yahoo.com');
INSERT INTO users (google_id, name, email) VALUES ('13579', 'Alice Johnson', 'alicej@example.com');
INSERT INTO users (google_id, name, email) VALUES ('24680', 'Bob Brown', 'bobbrown@hotmail.com');
INSERT INTO users (google_id, name, email) VALUES ('98765', 'Emily White', 'emilywhite@gmail.com');
INSERT INTO users (google_id, name, email) VALUES ('54321', 'Michael Lee', 'michael55@example.com');
INSERT INTO users (google_id, name, email) VALUES ('76543', 'Sarah Davis', 'sdavis@yahoo.com');
INSERT INTO users (google_id, name, email) VALUES ('32167', 'Robert Miller', 'robertmiller@example.com');
INSERT INTO users (google_id, name, email) VALUES ('89076', 'Laura Wilson', 'lwilson@gmail.com');
INSERT INTO users (google_id, name, email) VALUES ('54321', 'Ryan Moore', 'ryanmoore@example.com');
