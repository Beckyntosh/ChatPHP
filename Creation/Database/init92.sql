CREATE TABLE IF NOT EXISTS job_listings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    job_title VARCHAR(255) NOT NULL,
    location VARCHAR(100),
    job_type VARCHAR(50),
    experience_level VARCHAR(50),
    description TEXT,
    posted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO job_listings (job_title, location, job_type, experience_level, description) VALUES ('Frontend Developer', 'Remote', 'Full-time', 'Mid-level', 'Description 1...'),
('Backend Developer', 'Office', 'Full-time', 'Senior-level', 'Description 2...'),
('Data Analyst', 'Remote', 'Part-time', 'Mid-level', 'Description 3...'),
('UX Designer', 'Office', 'Contract', 'Senior-level', 'Description 4...'),
('Project Manager', 'Office', 'Full-time', 'Senior-level', 'Description 5...'),
('Software Engineer', 'Remote', 'Contract', 'Mid-level', 'Description 6...'),
('Content Writer', 'Office', 'Full-time', 'Entry-level', 'Description 7...'),
('Marketing Specialist', 'Remote', 'Part-time', 'Entry-level', 'Description 8...'),
('HR Manager', 'Office', 'Full-time', 'Senior-level', 'Description 9...'),
('Product Manager', 'Remote', 'Full-time', 'Mid-level', 'Description 10...');
