CREATE TABLE IF NOT EXISTS job_listings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(250) NOT NULL,
description TEXT NOT NULL,
location VARCHAR(100),
type VARCHAR(50),
remote VARCHAR(20),
posted_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO job_listings (title, description, location, type, remote) VALUES ('Remote Software Developer', 'Looking for a skilled remote software developer', 'Remote', 'Developer', 'Yes');
INSERT INTO job_listings (title, description, location, type, remote) VALUES ('Software Engineer', 'Exciting opportunity for a software engineer', 'San Francisco', 'Engineer', 'No');
INSERT INTO job_listings (title, description, location, type, remote) VALUES ('Web Developer', 'Seeking a talented web developer for our team', 'New York', 'Developer', 'Yes');
INSERT INTO job_listings (title, description, location, type, remote) VALUES ('Database Administrator', 'Join our team as a database administrator', 'Chicago', 'Administrator', 'No');
INSERT INTO job_listings (title, description, location, type, remote) VALUES ('Software Tester', 'Looking for a software tester with experience', 'Remote', 'Tester', 'Yes');
INSERT INTO job_listings (title, description, location, type, remote) VALUES ('UI/UX Designer', 'Exciting opportunity for a UI/UX designer', 'Los Angeles', 'Designer', 'No');
INSERT INTO job_listings (title, description, location, type, remote) VALUES ('Product Manager', 'Join our team as a product manager', 'Austin', 'Manager', 'No');
INSERT INTO job_listings (title, description, location, type, remote) VALUES ('Systems Analyst', 'Seeking a systems analyst with strong analytical skills', 'Remote', 'Analyst', 'Yes');
INSERT INTO job_listings (title, description, location, type, remote) VALUES ('Network Engineer', 'Exciting opportunity for a network engineer', 'Seattle', 'Engineer', 'No');
INSERT INTO job_listings (title, description, location, type, remote) VALUES ('Quality Assurance Specialist', 'Looking for a quality assurance specialist to ensure product quality', 'Boston', 'Specialist', 'No');
