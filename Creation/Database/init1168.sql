CREATE TABLE IF NOT EXISTS employees (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    position VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    reviewer_id INT(6) UNSIGNED,
    reviewee_id INT(6) UNSIGNED,
    rating INT(5),
    comments TEXT,
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (reviewer_id) REFERENCES employees(id),
    FOREIGN KEY (reviewee_id) REFERENCES employees(id)
);

INSERT INTO employees (name, position) VALUES ('John Doe', 'Manager');
INSERT INTO employees (name, position) VALUES ('Jane Smith', 'Developer');
INSERT INTO employees (name, position) VALUES ('Mark Johnson', 'Designer');
INSERT INTO employees (name, position) VALUES ('Emily Brown', 'Sales');
INSERT INTO employees (name, position) VALUES ('Chris Lee', 'HR');
INSERT INTO employees (name, position) VALUES ('Sarah Wilson', 'Accountant');
INSERT INTO employees (name, position) VALUES ('Alex Taylor', 'IT');
INSERT INTO employees (name, position) VALUES ('Laura Davis', 'Marketing');
INSERT INTO employees (name, position) VALUES ('Michael Clark', 'Engineer');
INSERT INTO employees (name, position) VALUES ('Amanda Rodriguez', 'Customer Support');
