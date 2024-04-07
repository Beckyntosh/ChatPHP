CREATE TABLE IF NOT EXISTS jobs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
location VARCHAR(50),
job_type VARCHAR(50),
experience_level VARCHAR(50),
description TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO jobs (title, location, job_type, experience_level, description) VALUES 
('Job 1', 'New York', 'Full-time', 'Mid-level', 'Description for Job 1'),
('Job 2', 'Los Angeles', 'Part-time', 'Entry-level', 'Description for Job 2'),
('Job 3', 'Chicago', 'Remote', 'Senior', 'Description for Job 3'),
('Job 4', 'San Francisco', 'Internship', 'Junior', 'Description for Job 4'),
('Job 5', 'Miami', 'Freelance', 'Mid-level', 'Description for Job 5'),
('Job 6', 'Seattle', 'Full-time', 'Senior', 'Description for Job 6'),
('Job 7', 'Boston', 'Part-time', 'Junior', 'Description for Job 7'),
('Job 8', 'Austin', 'Remote', 'Mid-level', 'Description for Job 8'),
('Job 9', 'Denver', 'Full-time', 'Senior', 'Description for Job 9'),
('Job 10', 'Portland', 'Part-time', 'Entry-level', 'Description for Job 10');