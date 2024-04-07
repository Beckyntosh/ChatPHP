CREATE TABLE IF NOT EXISTS employees (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  reviewer_id INT(6) UNSIGNED,
  reviewee_id INT(6) UNSIGNED,
  rating INT(1),
  comments TEXT,
  review_date TIMESTAMP,
  FOREIGN KEY (reviewer_id) REFERENCES employees(id),
  FOREIGN KEY (reviewee_id) REFERENCES employees(id)
);

INSERT INTO employees (name, email, reg_date) VALUES ('John Doe', 'john.doe@example.com', NOW());
INSERT INTO employees (name, email, reg_date) VALUES ('Jane Smith', 'jane.smith@example.com', NOW());
INSERT INTO employees (name, email, reg_date) VALUES ('Alice Johnson', 'alice.johnson@example.com', NOW());
INSERT INTO employees (name, email, reg_date) VALUES ('Bob Brown', 'bob.brown@example.com', NOW());
INSERT INTO employees (name, email, reg_date) VALUES ('Emma Wilson', 'emma.wilson@example.com', NOW());
INSERT INTO employees (name, email, reg_date) VALUES ('Michael Lee', 'michael.lee@example.com', NOW());
INSERT INTO employees (name, email, reg_date) VALUES ('Sophia Davis', 'sophia.davis@example.com', NOW());
INSERT INTO employees (name, email, reg_date) VALUES ('William Martin', 'william.martin@example.com', NOW());
INSERT INTO employees (name, email, reg_date) VALUES ('Olivia Garcia', 'olivia.garcia@example.com', NOW());
INSERT INTO employees (name, email, reg_date) VALUES ('James Rodriguez', 'james.rodriguez@example.com', NOW());