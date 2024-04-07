CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP,
  loyalty_member BOOLEAN DEFAULT FALSE
);

CREATE TABLE IF NOT EXISTS loyalty_program (
  user_id INT(6) UNSIGNED,
  points INT(6) DEFAULT 0,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (firstname, lastname, email, loyalty_member) VALUES ('John', 'Doe', 'john.doe@example.com', 1);
INSERT INTO users (firstname, lastname, email, loyalty_member) VALUES ('Jane', 'Smith', 'jane.smith@example.com', 0);
INSERT INTO users (firstname, lastname, email, loyalty_member) VALUES ('Michael', 'Johnson', 'michael.johnson@example.com', 1);
INSERT INTO users (firstname, lastname, email, loyalty_member) VALUES ('Sarah', 'Williams', 'sarah.williams@example.com', 0);
INSERT INTO users (firstname, lastname, email, loyalty_member) VALUES ('David', 'Brown', 'david.brown@example.com', 1);
INSERT INTO users (firstname, lastname, email, loyalty_member) VALUES ('Emily', 'Anderson', 'emily.anderson@example.com', 0);
INSERT INTO users (firstname, lastname, email, loyalty_member) VALUES ('Ryan', 'Martinez', 'ryan.martinez@example.com', 1);
INSERT INTO users (firstname, lastname, email, loyalty_member) VALUES ('Jessica', 'Garcia', 'jessica.garcia@example.com', 0);
INSERT INTO users (firstname, lastname, email, loyalty_member) VALUES ('William', 'Thomas', 'william.thomas@example.com', 1);
INSERT INTO users (firstname, lastname, email, loyalty_member) VALUES ('Olivia', 'Rodriguez', 'olivia.rodriguez@example.com', 0);
