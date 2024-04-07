CREATE TABLE IF NOT EXISTS jobs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(50) NOT NULL,
location VARCHAR(50) NOT NULL,
type VARCHAR(50) NOT NULL,
experience INT(10),
description TEXT,
reg_date TIMESTAMP
);

INSERT INTO jobs (title, location, type, experience, description) VALUES ('Software Engineer', 'San Francisco', 'Full-time', 3, 'Seeking a highly skilled software engineer for our tech company.');
INSERT INTO jobs (title, location, type, experience, description) VALUES ('Data Analyst', 'New York', 'Part-time', 2, 'Looking for a data analyst to analyze large datasets and provide valuable insights.');
INSERT INTO jobs (title, location, type, experience, description) VALUES ('Marketing Specialist', 'Los Angeles', 'Contract', 5, 'Join our marketing team and help develop innovative marketing strategies.');
INSERT INTO jobs (title, location, type, experience, description) VALUES ('Graphic Designer', 'Chicago', 'Full-time', 4, 'Create stunning visuals and designs for our clients.');
INSERT INTO jobs (title, location, type, experience, description) VALUES ('HR Manager', 'Seattle', 'Full-time', 6, 'Oversee all aspects of HR operations and ensure a positive work environment.');
INSERT INTO jobs (title, location, type, experience, description) VALUES ('Sales Representative', 'Boston', 'Commission-based', 2, 'Join our sales team and help drive business growth.');
INSERT INTO jobs (title, location, type, experience, description) VALUES ('Customer Support Specialist', 'Austin', 'Remote', 1, 'Provide excellent customer service and solve inquiries in a timely manner.');
INSERT INTO jobs (title, location, type, experience, description) VALUES ('Project Manager', 'Denver', 'Full-time', 5, 'Lead project teams and ensure successful project delivery.');
INSERT INTO jobs (title, location, type, experience, description) VALUES ('Financial Analyst', 'Miami', 'Internship', 0, 'Gain hands-on experience in financial analysis and reporting.');
INSERT INTO jobs (title, location, type, experience, description) VALUES ('Legal Counsel', 'Washington D.C.', 'Full-time', 7, 'Provide legal expertise and guidance to the organization.');
