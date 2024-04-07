CREATE TABLE IF NOT EXISTS employees (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  employee_id INT(6) UNSIGNED,
  reviewer_id INT(6) UNSIGNED,
  performance_rating INT,
  comments TEXT,
  review_date TIMESTAMP,
  FOREIGN KEY (employee_id) REFERENCES employees(id),
  FOREIGN KEY (reviewer_id) REFERENCES employees(id)
);

INSERT INTO employees (name, email) VALUES ('John Doe', 'john.doe@example.com');
INSERT INTO employees (name, email) VALUES ('Jane Doe', 'jane.doe@example.com');
INSERT INTO employees (name, email) VALUES ('Emily Smith', 'emily.smith@example.com');
INSERT INTO employees (name, email) VALUES ('Michael Johnson', 'michael.johnson@example.com');
INSERT INTO employees (name, email) VALUES ('Sarah Davis', 'sarah.davis@example.com');
INSERT INTO employees (name, email) VALUES ('Robert Wilson', 'robert.wilson@example.com');
INSERT INTO employees (name, email) VALUES ('Laura Brown', 'laura.brown@example.com');
INSERT INTO employees (name, email) VALUES ('Daniel Clark', 'daniel.clark@example.com');
INSERT INTO employees (name, email) VALUES ('Jessica Martinez', 'jessica.martinez@example.com');
INSERT INTO employees (name, email) VALUES ('Andrew Rodriguez', 'andrew.rodriguez@example.com');