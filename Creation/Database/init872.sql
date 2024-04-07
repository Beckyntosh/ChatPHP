CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL
);

CREATE TABLE articles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(100) NOT NULL,
  category VARCHAR(50) NOT NULL
);

CREATE TABLE events (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(100) NOT NULL,
  description TEXT,
  date DATE,
  location VARCHAR(100)
);

CREATE TABLE enrolment (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  product_id INT NOT NULL
);

INSERT INTO users (username, name, email, password) VALUES ('user1', 'John Doe', 'john.doe@example.com', 'hashed_password1');
INSERT INTO users (username, name, email, password) VALUES ('user2', 'Jane Smith', 'jane.smith@example.com', 'hashed_password2');
INSERT INTO articles (title, category) VALUES ('Article 1', 'Category A');
INSERT INTO articles (title, category) VALUES ('Article 2', 'Category B');
INSERT INTO events (title, description, date, location) VALUES ('Event 1', 'Description for Event 1', '2022-08-15', 'Location A');
INSERT INTO events (title, description, date, location) VALUES ('Event 2', 'Description for Event 2', '2022-09-20', 'Location B');
INSERT INTO enrolment (user_id, product_id) VALUES (1, 1);
INSERT INTO enrolment (user_id, product_id) VALUES (2, 2);
INSERT INTO enrolment (user_id, product_id) VALUES (1, 2);
INSERT INTO enrolment (user_id, product_id) VALUES (2, 3);
