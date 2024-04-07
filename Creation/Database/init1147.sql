CREATE TABLE IF NOT EXISTS job_listings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    job_title VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    job_type VARCHAR(50),
    description TEXT,
    date_posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO job_listings (job_title, location, job_type, description) VALUES
('Remote Software Engineer', 'Remote', 'Full-time', 'Looking for experienced software engineers to join our remote team.'),
('Marketing Specialist', 'New York', 'Part-time', 'Seeking a creative individual with marketing experience.'),
('Graphic Designer', 'Los Angeles', 'Full-time', 'We are hiring talented graphic designers for our design team.'),
('Data Analyst', 'Remote', 'Full-time', 'Join our data analytics team and work remotely on exciting projects.'),
('Customer Service Representative', 'Chicago', 'Full-time', 'Looking for energetic and customer-focused individuals.'),
('Sales Manager', 'San Francisco', 'Full-time', 'Manage sales team and drive revenue growth.'),
('Web Developer', 'Remote', 'Part-time', 'Work on web development projects from the comfort of your home.'),
('HR Manager', 'Boston', 'Full-time', 'Lead our human resources department and support our employees.'),
('Content Writer', 'Remote', 'Part-time', 'Create engaging content for various platforms.'),
('Financial Analyst', 'Dallas', 'Full-time', 'Analyzing financial data and providing insights for decision-making.');
