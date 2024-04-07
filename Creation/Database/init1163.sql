CREATE TABLE IF NOT EXISTS job_listings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
description TEXT NOT NULL,
location VARCHAR(100),
type ENUM('full-time', 'part-time', 'remote') NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert sample data into job_listings table
INSERT INTO job_listings (title, description, location, type) VALUES ('Software Engineer', 'Description for Software Engineer position', 'San Francisco', 'full-time');
INSERT INTO job_listings (title, description, location, type) VALUES ('Web Developer', 'Description for Web Developer position', 'New York', 'part-time');
INSERT INTO job_listings (title, description, location, type) VALUES ('Data Analyst', 'Description for Data Analyst position', 'Chicago', 'remote');
INSERT INTO job_listings (title, description, location, type) VALUES ('UX Designer', 'Description for UX Designer position', 'Los Angeles', 'full-time');
INSERT INTO job_listings (title, description, location, type) VALUES ('Project Manager', 'Description for Project Manager position', 'Seattle', 'part-time');
INSERT INTO job_listings (title, description, location, type) VALUES ('Marketing Specialist', 'Description for Marketing Specialist position', 'Denver', 'remote');
INSERT INTO job_listings (title, description, location, type) VALUES ('Business Analyst', 'Description for Business Analyst position', 'Austin', 'full-time');
INSERT INTO job_listings (title, description, location, type) VALUES ('Software Developer', 'Description for Software Developer position', 'Miami', 'part-time');
INSERT INTO job_listings (title, description, location, type) VALUES ('Quality Assurance Tester', 'Description for QA Tester position', 'Boston', 'remote');
INSERT INTO job_listings (title, description, location, type) VALUES ('Graphic Designer', 'Description for Graphic Designer position', 'Portland', 'full-time');
