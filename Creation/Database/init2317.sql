CREATE TABLE IF NOT EXISTS Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(50) NOT NULL,
    loyalty_member BOOLEAN DEFAULT 0,
    reg_date TIMESTAMP
);

INSERT INTO Users (firstname, lastname, email, password, loyalty_member) VALUES ('John', 'Doe', 'johndoe@example.com', 'password1', 1);
INSERT INTO Users (firstname, lastname, email, password, loyalty_member) VALUES ('Jane', 'Smith', 'janesmith@example.com', 'password2', 0);
INSERT INTO Users (firstname, lastname, email, password, loyalty_member) VALUES ('Alice', 'Johnson', 'alicejohnson@example.com', 'password3', 1);
INSERT INTO Users (firstname, lastname, email, password, loyalty_member) VALUES ('Bob', 'Brown', 'bobbrown@example.com', 'password4', 0);
INSERT INTO Users (firstname, lastname, email, password, loyalty_member) VALUES ('Sarah', 'Williams', 'sarahwilliams@example.com', 'password5', 1);
INSERT INTO Users (firstname, lastname, email, password, loyalty_member) VALUES ('Mike', 'Davis', 'mikedavis@example.com', 'password6', 0);
INSERT INTO Users (firstname, lastname, email, password, loyalty_member) VALUES ('Emily', 'Martinez', 'emilymartinez@example.com', 'password7', 1);
INSERT INTO Users (firstname, lastname, email, password, loyalty_member) VALUES ('Chris', 'Garcia', 'chrisgarcia@example.com', 'password8', 0);
INSERT INTO Users (firstname, lastname, email, password, loyalty_member) VALUES ('Karen', 'Rodriguez', 'karenrodriguez@example.com', 'password9', 1);
INSERT INTO Users (firstname, lastname, email, password, loyalty_member) VALUES ('Kevin', 'Lopez', 'kevinlopez@example.com', 'password10', 0);
