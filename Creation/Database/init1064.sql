CREATE TABLE IF NOT EXISTS employees (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  department VARCHAR(50) NOT NULL,
  registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  employee_id INT(6) UNSIGNED NOT NULL,
  reviewer_id INT(6) UNSIGNED NOT NULL,
  content TEXT NOT NULL,
  rating DECIMAL(2,1) NOT NULL,
  review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (employee_id) REFERENCES employees(id),
  FOREIGN KEY (reviewer_id) REFERENCES employees(id)
);

INSERT INTO employees (name, email, department) VALUES
('John Doe', 'john.doe@example.com', 'Marketing'),
('Jane Smith', 'jane.smith@example.com', 'Finance'),
('Michael Johnson', 'michael.johnson@example.com', 'Human Resources'),
('Emily Williams', 'emily.williams@example.com', 'Engineering'),
('Chris Brown', 'chris.brown@example.com', 'Operations'),
('Sarah Lee', 'sarah.lee@example.com', 'Sales'),
('David Martinez', 'david.martinez@example.com', 'Customer Support'),
('Maria Thompson', 'maria.thompson@example.com', 'Product Development'),
('Kevin Robinson', 'kevin.robinson@example.com', 'IT'),
('Laura Garcia', 'laura.garcia@example.com', 'Research');