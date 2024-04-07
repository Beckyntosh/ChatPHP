CREATE TABLE IF NOT EXISTS jobs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(250) NOT NULL,
description TEXT NOT NULL,
location ENUM('remote', 'onsite') NOT NULL,
type ENUM('full-time', 'part-time') NOT NULL,
category VARCHAR(100) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO jobs (title, description, location, type, category) VALUES ('Remote Software Engineer', 'Join our team as a remote software engineer', 'remote', 'full-time', 'Software Development');
INSERT INTO jobs (title, description, location, type, category) VALUES ('On-Site Data Analyst', 'Seeking a data analyst to work on-site at our office', 'onsite', 'part-time', 'Data Analysis');
INSERT INTO jobs (title, description, location, type, category) VALUES ('Remote Graphic Designer', 'Create stunning designs from the comfort of your home', 'remote', 'full-time', 'Design');
INSERT INTO jobs (title, description, location, type, category) VALUES ('On-Site Marketing Specialist', 'Help us with our marketing efforts at our office', 'onsite', 'full-time', 'Marketing');
INSERT INTO jobs (title, description, location, type, category) VALUES ('Remote Content Writer', 'Produce engaging content remotely for our clients', 'remote', 'part-time', 'Content Creation');
INSERT INTO jobs (title, description, location, type, category) VALUES ('On-Site Customer Support Representative', 'Provide exceptional customer support at our office', 'onsite', 'full-time', 'Customer Service');
INSERT INTO jobs (title, description, location, type, category) VALUES ('Remote Project Manager', 'Lead remote project teams to success', 'remote', 'full-time', 'Project Management');
INSERT INTO jobs (title, description, location, type, category) VALUES ('On-Site Sales Executive', 'Drive sales initiatives at our office location', 'onsite', 'full-time', 'Sales');
INSERT INTO jobs (title, description, location, type, category) VALUES ('Remote UI/UX Designer', 'Design user-friendly interfaces remotely', 'remote', 'full-time', 'UI/UX Design');
INSERT INTO jobs (title, description, location, type, category) VALUES ('On-Site HR Specialist', 'Manage human resources functions on-site', 'onsite', 'part-time', 'Human Resources');