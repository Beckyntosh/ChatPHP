CREATE TABLE IF NOT EXISTS jobs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(100) NOT NULL,
description TEXT NOT NULL,
location VARCHAR(50),
type VARCHAR(50),
remote TINYINT(1) DEFAULT 0,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO jobs (title, description, location, type, remote) VALUES 
('Software Engineer', 'Looking for a skilled software engineer to join our team', 'remote', 'fulltime', 1),
('Graphic Designer', 'Need a creative graphic designer for marketing materials', 'office', 'parttime', 0),
('Marketing Specialist', 'Experienced marketing professional for a new product launch', 'remote', 'contract', 1),
('HR Assistant', 'Support HR department with recruitment and admin tasks', 'office', 'fulltime', 0),
('Web Developer', 'Building websites and web applications for clients', 'remote', 'fulltime', 1),
('Sales Associate', 'Help customers with product selection and purchases', 'office', 'parttime', 0),
('Content Writer', 'Create engaging content for blog posts and social media', 'remote', 'contract', 1),
('Customer Service Representative', 'Assist customers with inquiries and order processing', 'office', 'fulltime', 0),
('Data Analyst', 'Analyzing data and providing insights for business decisions', 'remote', 'fulltime', 1),
('Quality Control Inspector', 'Ensuring product quality meets company standards', 'office', 'parttime', 0);
