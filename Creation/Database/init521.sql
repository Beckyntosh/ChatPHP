CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (firstname, lastname, email) VALUES ('John', 'Doe', 'johndoe@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Jane', 'Smith', 'janesmith@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Alice', 'Johnson', 'alicejohnson@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Bob', 'Brown', 'bobbrown@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Mary', 'Williams', 'marywilliams@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('David', 'Jones', 'davidjones@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Sarah', 'Davis', 'sarahdavis@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Michael', 'Wilson', 'michaelwilson@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Emily', 'Martinez', 'emilymartinez@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Kevin', 'Garcia', 'kevingarcia@example.com');
