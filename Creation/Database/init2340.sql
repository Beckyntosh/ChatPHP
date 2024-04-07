CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (firstname, lastname, email, password) VALUES ('John', 'Doe', 'johndoe@example.com', 'hashedpassword1');
INSERT INTO users (firstname, lastname, email, password) VALUES ('Jane', 'Smith', 'janesmith@example.com', 'hashedpassword2');
INSERT INTO users (firstname, lastname, email, password) VALUES ('Alice', 'Johnson', 'alicejohnson@example.com', 'hashedpassword3');
INSERT INTO users (firstname, lastname, email, password) VALUES ('Bob', 'Brown', 'bobbrown@example.com', 'hashedpassword4');
INSERT INTO users (firstname, lastname, email, password) VALUES ('Emily', 'Wilson', 'emilywilson@example.com', 'hashedpassword5');
INSERT INTO users (firstname, lastname, email, password) VALUES ('Alex', 'Martinez', 'alexmartinez@example.com', 'hashedpassword6');
INSERT INTO users (firstname, lastname, email, password) VALUES ('Sarah', 'Garcia', 'sarahgarcia@example.com', 'hashedpassword7');
INSERT INTO users (firstname, lastname, email, password) VALUES ('Michael', 'Rodriguez', 'michaelrodriguez@example.com', 'hashedpassword8');
INSERT INTO users (firstname, lastname, email, password) VALUES ('Samantha', 'Perez', 'samanthaperez@example.com', 'hashedpassword9');
INSERT INTO users (firstname, lastname, email, password) VALUES ('David', 'Lopez', 'davidlopez@example.com', 'hashedpassword10');