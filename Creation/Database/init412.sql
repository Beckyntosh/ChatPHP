CREATE TABLE events (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  description VARCHAR(255),
  event_date DATE,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE volunteers (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  event_id INT(6) UNSIGNED,
  name VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (event_id) REFERENCES events(id)
);

INSERT INTO events (name, description, event_date) VALUES ('Event 1', 'Description for Event 1', '2023-06-15');
INSERT INTO events (name, description, event_date) VALUES ('Event 2', 'Description for Event 2', '2023-07-20');
INSERT INTO events (name, description, event_date) VALUES ('Event 3', 'Description for Event 3', '2023-08-10');
INSERT INTO events (name, description, event_date) VALUES ('Event 4', 'Description for Event 4', '2023-09-05');
INSERT INTO events (name, description, event_date) VALUES ('Event 5', 'Description for Event 5', '2023-10-15');

INSERT INTO volunteers (event_id, name, email) VALUES (1, 'John Doe', 'john.doe@example.com');
INSERT INTO volunteers (event_id, name, email) VALUES (1, 'Jane Smith', 'jane.smith@example.com');
INSERT INTO volunteers (event_id, name, email) VALUES (2, 'Michael Johnson', 'michael.johnson@example.com');
INSERT INTO volunteers (event_id, name, email) VALUES (3, 'Emily Brown', 'emily.brown@example.com');
INSERT INTO volunteers (event_id, name, email) VALUES (3, 'Adam Wilson', 'adam.wilson@example.com');