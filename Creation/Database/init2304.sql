CREATE TABLE IF NOT EXISTS Users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP,
  loyalty_member BOOLEAN NOT NULL DEFAULT FALSE
);

INSERT INTO Users (firstname, lastname, email, loyalty_member) VALUES ('John', 'Doe', 'johndoe@example.com', 1);
INSERT INTO Users (firstname, lastname, email, loyalty_member) VALUES ('Jane', 'Smith', 'janesmith@example.com', 0);
INSERT INTO Users (firstname, lastname, email, loyalty_member) VALUES ('Alice', 'Johnson', 'alicejohnson@example.com', 1);
INSERT INTO Users (firstname, lastname, email, loyalty_member) VALUES ('Bob', 'Brown', 'bobbrown@example.com', 0);
INSERT INTO Users (firstname, lastname, email, loyalty_member) VALUES ('Mary', 'Davis', 'marydavis@example.com', 1);
INSERT INTO Users (firstname, lastname, email, loyalty_member) VALUES ('Sam', 'Wilson', 'samwilson@example.com', 0);
INSERT INTO Users (firstname, lastname, email, loyalty_member) VALUES ('Emily', 'Miller', 'emilymiller@example.com', 1);
INSERT INTO Users (firstname, lastname, email, loyalty_member) VALUES ('Tom', 'Clark', 'tomclark@example.com', 0);
INSERT INTO Users (firstname, lastname, email, loyalty_member) VALUES ('Sara', 'Martinez', 'saramartinez@example.com', 1);
INSERT INTO Users (firstname, lastname, email, loyalty_member) VALUES ('Chris', 'Lee', 'chrislee@example.com', 0);
