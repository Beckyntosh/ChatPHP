CREATE TABLE IF NOT EXISTS employees (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(50) NOT NULL,
    position VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    employee_id INT(6) UNSIGNED,
    reviewer_id INT(6) UNSIGNED,
    content TEXT NOT NULL,
    rating INT(1),
    review_date TIMESTAMP,
    FOREIGN KEY (employee_id) REFERENCES employees(id),
    FOREIGN KEY (reviewer_id) REFERENCES employees(id)
);

INSERT INTO employees (fullName, position, email) VALUES ('Alice Johnson', 'Manager', 'alice@example.com');
INSERT INTO employees (fullName, position, email) VALUES ('Bob Smith', 'Developer', 'bob@example.com');
INSERT INTO employees (fullName, position, email) VALUES ('Charlie Brown', 'Analyst', 'charlie@example.com');
INSERT INTO employees (fullName, position, email) VALUES ('David Lee', 'Designer', 'david@example.com');
INSERT INTO employees (fullName, position, email) VALUES ('Eve Wilson', 'Marketing', 'eve@example.com');
INSERT INTO employees (fullName, position, email) VALUES ('Frank Miller', 'Sales', 'frank@example.com');
INSERT INTO employees (fullName, position, email) VALUES ('Grace Davis', 'HR', 'grace@example.com');
INSERT INTO employees (fullName, position, email) VALUES ('Henry Ford', 'Accounting', 'henry@example.com');
INSERT INTO employees (fullName, position, email) VALUES ('Ivy Parker', 'Intern', 'ivy@example.com');
INSERT INTO employees (fullName, position, email) VALUES ('John Doe', 'Consultant', 'john@example.com');
