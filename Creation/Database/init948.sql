CREATE TABLE IF NOT EXISTS employees (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    registration_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    reviewer_id INT(6) UNSIGNED,
    employee_id INT(6) UNSIGNED,
    performance_rating INT NOT NULL,
    feedback TEXT NOT NULL,
    review_date TIMESTAMP,
    FOREIGN KEY (reviewer_id) REFERENCES employees(id),
    FOREIGN KEY (employee_id) REFERENCES employees(id)
);

INSERT INTO employees (name, email, registration_date) VALUES ('John Doe', 'john.doe@example.com', NOW());
INSERT INTO employees (name, email, registration_date) VALUES ('Jane Smith', 'jane.smith@example.com', NOW());
INSERT INTO employees (name, email, registration_date) VALUES ('Michael Johnson', 'michael.johnson@example.com', NOW());
INSERT INTO employees (name, email, registration_date) VALUES ('Sarah Brown', 'sarah.brown@example.com', NOW());
INSERT INTO employees (name, email, registration_date) VALUES ('Robert Davis', 'robert.davis@example.com', NOW());
INSERT INTO employees (name, email, registration_date) VALUES ('Laura Wilson', 'laura.wilson@example.com', NOW());
INSERT INTO employees (name, email, registration_date) VALUES ('William Taylor', 'william.taylor@example.com', NOW());
INSERT INTO employees (name, email, registration_date) VALUES ('Emily Miller', 'emily.miller@example.com', NOW());
INSERT INTO employees (name, email, registration_date) VALUES ('Daniel Martinez', 'daniel.martinez@example.com', NOW());
INSERT INTO employees (name, email, registration_date) VALUES ('Maria Garcia', 'maria.garcia@example.com', NOW());