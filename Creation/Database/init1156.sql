CREATE TABLE IF NOT EXISTS jobs (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
description TEXT,
location VARCHAR(100),
type VARCHAR(50),
remote ENUM('yes', 'no') DEFAULT 'no'
);

INSERT INTO jobs (title, description, location, type, remote) VALUES 
('Remote Software Developer', 'Looking for talented software developers to work remotely', 'Global', 'Software Development', 'yes'),
('Data Analyst', 'Analyzing data sets to provide insights', 'New York', 'Data', 'no'),
('Web Designer', 'Creating visually appealing websites for clients', 'California', 'Design', 'no'),
('Project Manager', 'Oversee and manage project timelines and deliverables', 'London', 'Management', 'no'),
('Marketing Coordinator', 'Developing and implementing marketing strategies', 'Chicago', 'Marketing', 'no'),
('Customer Support Specialist', 'Providing excellent customer service and technical support', 'Boston', 'Customer Service', 'no'),
('HR Recruiter', 'Sourcing and recruiting top talents for the company', 'Toronto', 'Human Resources', 'no'),
('Finance Analyst', 'Analyzing financial data and preparing reports', 'Sydney', 'Finance', 'yes'),
('Content Writer', 'Creating engaging content for various platforms', 'Dallas', 'Content Creation', 'no'),
('Sales Representative', 'Meeting sales targets and building client relationships', 'Miami', 'Sales', 'no');
