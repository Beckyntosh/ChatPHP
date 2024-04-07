CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    loyalty_member BOOLEAN NOT NULL DEFAULT FALSE,
    reg_date TIMESTAMP
);

INSERT INTO users (firstname, lastname, email, loyalty_member) VALUES ('John', 'Doe', 'johndoe@example.com', 1);
INSERT INTO users (firstname, lastname, email, loyalty_member) VALUES ('Jane', 'Smith', 'janesmith@example.com', 0);
INSERT INTO users (firstname, lastname, email, loyalty_member) VALUES ('Michael', 'Johnson', 'michaeljohnson@example.com', 1);
INSERT INTO users (firstname, lastname, email, loyalty_member) VALUES ('Emily', 'Brown', 'emilybrown@example.com', 0);
INSERT INTO users (firstname, lastname, email, loyalty_member) VALUES ('William', 'Davis', 'williamdavis@example.com', 1);
INSERT INTO users (firstname, lastname, email, loyalty_member) VALUES ('Olivia', 'Martinez', 'oliviamartinez@example.com', 0);
INSERT INTO users (firstname, lastname, email, loyalty_member) VALUES ('James', 'Garcia', 'jamesgarcia@example.com', 1);
INSERT INTO users (firstname, lastname, email, loyalty_member) VALUES ('Sophia', 'Rodriguez', 'sophiarodriguez@example.com', 0);
INSERT INTO users (firstname, lastname, email, loyalty_member) VALUES ('Benjamin', 'Wilson', 'benjaminwilson@example.com', 1);
INSERT INTO users (firstname, lastname, email, loyalty_member) VALUES ('Isabella', 'Lopez', 'isabellalopez@example.com', 0);
