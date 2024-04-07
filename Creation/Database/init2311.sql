CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  password VARCHAR(255),
  loyalty_member BOOLEAN DEFAULT false,
  reg_date TIMESTAMP
);

INSERT INTO users (firstname, lastname, email, password, loyalty_member) VALUES ('John', 'Doe', 'johndoe@example.com', 'hashedpassword1', 1);
INSERT INTO users (firstname, lastname, email, password, loyalty_member) VALUES ('Jane', 'Smith', 'janesmith@example.com', 'hashedpassword2', 0);
INSERT INTO users (firstname, lastname, email, password, loyalty_member) VALUES ('Mike', 'Johnson', 'mikejohnson@example.com', 'hashedpassword3', 1);
INSERT INTO users (firstname, lastname, email, password, loyalty_member) VALUES ('Sarah', 'Williams', 'sarahwilliams@example.com', 'hashedpassword4', 0);
INSERT INTO users (firstname, lastname, email, password, loyalty_member) VALUES ('Chris', 'Brown', 'chrisbrown@example.com', 'hashedpassword5', 1);
INSERT INTO users (firstname, lastname, email, password, loyalty_member) VALUES ('Julia', 'Clark', 'juliaclark@example.com', 'hashedpassword6', 0);
INSERT INTO users (firstname, lastname, email, password, loyalty_member) VALUES ('Alex', 'Davis', 'alexdavis@example.com', 'hashedpassword7', 1);
INSERT INTO users (firstname, lastname, email, password, loyalty_member) VALUES ('Emily', 'Martinez', 'emilymartinez@example.com', 'hashedpassword8', 0);
INSERT INTO users (firstname, lastname, email, password, loyalty_member) VALUES ('Ryan', 'Garcia', 'ryangarcia@example.com', 'hashedpassword9', 1);
INSERT INTO users (firstname, lastname, email, password, loyalty_member) VALUES ('Olivia', 'Lopez', 'olivialopez@example.com', 'hashedpassword10', 0);
