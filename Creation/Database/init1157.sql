CREATE TABLE IF NOT EXISTS job_listing (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
description TEXT,
location VARCHAR(100),
is_remote BOOLEAN DEFAULT false,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO job_listing (title, description, location, is_remote) VALUES 
('Software Engineer', 'Looking for a software engineer with experience in Java programming.', 'New York', false),
('Web Developer', 'Seeking a web developer proficient in HTML, CSS, and JavaScript.', 'Los Angeles', true),
('Data Analyst', 'Hiring a data analyst with strong analytical skills.', 'Chicago', false),
('Graphic Designer', 'Need a creative graphic designer with experience in Adobe Creative Suite.', 'San Francisco', true),
('Project Manager', 'Looking for an experienced project manager to lead a team.', 'Seattle', false),
('UX Designer', 'Seeking a UX designer to improve user experience on our website.', 'Boston', true),
('Marketing Specialist', 'Hiring a marketing specialist to manage social media campaigns.', 'Miami', false),
('Quality Assurance Tester', 'Need a QA tester to ensure software quality.', 'Austin', true),
('Mobile App Developer', 'Looking for a mobile app developer to build iOS and Android apps.', 'Denver', false),
('Network Administrator', 'Seeking a network administrator to manage our IT infrastructure.', 'Dallas', true);
