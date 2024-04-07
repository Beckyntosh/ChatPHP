CREATE TABLE IF NOT EXISTS jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    location VARCHAR(50),
    type VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO jobs (title, description, location, type) VALUES 
('Remote Software Developer', 'Looking for experienced software developers for remote positions', 'Remote', 'full-time'),
('Digital Marketing Manager', 'Hiring a digital marketing expert to join our team', 'New York', 'full-time'),
('Graphic Designer', 'Seeking a talented graphic designer with a passion for creativity', 'Los Angeles', 'part-time'),
('Data Analyst', 'Analyzing and interpreting complex data sets for business insights', 'Chicago', 'full-time'),
('Customer Service Representative', 'Providing exceptional customer support via phone and email', 'Remote', 'part-time'),
('Sales Associate', 'Developing relationships with clients and closing sales deals', 'Houston', 'full-time'),
('Web Developer', 'Creating responsive websites and web applications for clients', 'San Francisco', 'remote'),
('Accountant', 'Managing financial records and preparing financial statements', 'Dallas', 'full-time'),
('HR Specialist', 'Handling recruitment, employee relations, and HR compliance', 'Atlanta', 'part-time'),
('UI/UX Designer', 'Designing user-friendly interfaces for web and mobile applications', 'Remote', 'full-time');
