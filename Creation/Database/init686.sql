CREATE TABLE IF NOT EXISTS job_listing (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    location VARCHAR(100),
    type VARCHAR(50),
    salary DECIMAL(10, 2)
);

INSERT INTO job_listing (title, description, location, type, salary) VALUES 
('Software Engineer', 'Develop software applications', 'San Francisco, CA', 'Full-time', 100000.00),
('Marketing Manager', 'Develop marketing strategies', 'New York, NY', 'Full-time', 80000.00),
('Graphic Designer', 'Design graphics for websites', 'Los Angeles, CA', 'Part-time', 50000.00),
('Sales Representative', 'Sell products to clients', 'Chicago, IL', 'Full-time', 60000.00),
('Data Analyst', 'Analyze data for insights', 'Boston, MA', 'Full-time', 75000.00),
('Customer Service Representative', 'Assist customers with inquiries', 'Houston, TX', 'Part-time', 40000.00),
('Project Manager', 'Manage project timelines', 'Seattle, WA', 'Full-time', 90000.00),
('Accountant', 'Prepare financial statements', 'Dallas, TX', 'Full-time', 70000.00),
('HR Coordinator', 'Handle employee relations', 'Miami, FL', 'Part-time', 45000.00),
('Web Developer', 'Build websites and web applications', 'Atlanta, GA', 'Full-time', 85000.00);
