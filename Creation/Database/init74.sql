CREATE TABLE IF NOT EXISTS jobs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
description TEXT NOT NULL,
location VARCHAR(255),
type VARCHAR(50),
posted_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO jobs (title, description, location, type) VALUES ('Remote Software Developer', 'Looking for experienced software developers for remote positions', 'Remote', 'Full-time');
INSERT INTO jobs (title, description, location, type) VALUES ('Graphic Designer', 'Design graphics for various projects and campaigns', 'New York City', 'Part-time');
INSERT INTO jobs (title, description, location, type) VALUES ('Data Analyst', 'Analyzing data and generating insights for business decisions', 'San Francisco', 'Full-time');
INSERT INTO jobs (title, description, location, type) VALUES ('Marketing Manager', 'Develop and implement marketing strategies for the company', 'London', 'Full-time');
INSERT INTO jobs (title, description, location, type) VALUES ('Customer Service Representative', 'Assist customers with inquiries and issues', 'Remote', 'Part-time');
INSERT INTO jobs (title, description, location, type) VALUES ('Accountant', 'Manage financial records and prepare reports', 'Chicago', 'Full-time');
INSERT INTO jobs (title, description, location, type) VALUES ('Sales Executive', 'Drive sales and achieve revenue targets for the company', 'Los Angeles', 'Full-time');
INSERT INTO jobs (title, description, location, type) VALUES ('HR Coordinator', 'Manage recruitment and employee relations activities', 'Dubai', 'Full-time');
INSERT INTO jobs (title, description, location, type) VALUES ('Software Engineer', 'Develop and maintain software applications', 'Remote', 'Full-time');
INSERT INTO jobs (title, description, location, type) VALUES ('Content Writer', 'Create engaging content for websites and marketing materials', 'Toronto', 'Part-time');