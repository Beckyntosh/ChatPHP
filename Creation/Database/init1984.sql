CREATE TABLE volunteers (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  event varchar(255) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO volunteers (name, email, event) VALUES ('Alice', 'alice@example.com', 'Charity Run');
INSERT INTO volunteers (name, email, event) VALUES ('Bob', 'bob@example.com', 'Food Drive');
INSERT INTO volunteers (name, email, event) VALUES ('Charlie', 'charlie@example.com', 'Book Donation');
INSERT INTO volunteers (name, email, event) VALUES ('David', 'david@example.com', 'Charity Run');
INSERT INTO volunteers (name, email, event) VALUES ('Eve', 'eve@example.com', 'Food Drive');
INSERT INTO volunteers (name, email, event) VALUES ('Frank', 'frank@example.com', 'Book Donation');
INSERT INTO volunteers (name, email, event) VALUES ('Grace', 'grace@example.com', 'Charity Run');
INSERT INTO volunteers (name, email, event) VALUES ('Harry', 'harry@example.com', 'Food Drive');
INSERT INTO volunteers (name, email, event) VALUES ('Ivy', 'ivy@example.com', 'Book Donation');
INSERT INTO volunteers (name, email, event) VALUES ('Jack', 'jack@example.com', 'Charity Run');