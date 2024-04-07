CREATE TABLE users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP
);

INSERT INTO users (firstname, lastname, email) VALUES ('John', 'Doe', 'john.doe@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Jane', 'Smith', 'jane.smith@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Michael', 'Johnson', 'michael.johnson@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Emily', 'Brown', 'emily.brown@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('James', 'Williams', 'james.williams@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Sarah', 'Jones', 'sarah.jones@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('David', 'Garcia', 'david.garcia@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Laura', 'Martinez', 'laura.martinez@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Daniel', 'Hernandez', 'daniel.hernandez@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Amy', 'Young', 'amy.young@example.com');
