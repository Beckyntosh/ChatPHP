CREATE TABLE users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL
);

CREATE TABLE achievements (
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT,
  name VARCHAR(50) NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE badges (
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT,
  name VARCHAR(50) NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Insert values into the tables
INSERT INTO users (name) VALUES ('Alice'), ('Bob'), ('Charlie'), ('David'), ('Eva'), ('Frank'), ('Grace'), ('Henry'), ('Ivy'), ('Jack');
INSERT INTO achievements (user_id, name) VALUES (1, 'First achievement'), (2, 'Second achievement'), (3, 'Third achievement'), (4, 'Fourth achievement'), (5, 'Fifth achievement');
INSERT INTO badges (user_id, name) VALUES (1, 'Badge A'), (2, 'Badge B'), (3, 'Badge C'), (4, 'Badge D'), (5, 'Badge E');