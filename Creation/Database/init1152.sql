CREATE TABLE IF NOT EXISTS jobs (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  location VARCHAR(100),
  type ENUM('full-time', 'part-time', 'contract', 'remote') NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO jobs (title, description, location, type) VALUES ('Remote Software Developer', 'Looking for a skilled software developer to work remotely on various projects', 'Remote', 'full-time');
INSERT INTO jobs (title, description, location, type) VALUES ('Graphic Designer', 'In-office graphic designer position for a creative agency', 'New York', 'full-time');
INSERT INTO jobs (title, description, location, type) VALUES ('Data Analyst', 'Contract position for a data analyst to analyze company data', 'Chicago', 'contract');
INSERT INTO jobs (title, description, location, type) VALUES ('Web Developer', 'Part-time web developer needed for ongoing website maintenance', 'Los Angeles', 'part-time');
INSERT INTO jobs (title, description, location, type) VALUES ('Marketing Manager', 'Full-time marketing manager role in a fast-paced startup environment', 'San Francisco', 'full-time');
INSERT INTO jobs (title, description, location, type) VALUES ('Customer Support Specialist', 'Remote customer support position for a tech company', 'Remote', 'full-time');
INSERT INTO jobs (title, description, location, type) VALUES ('Accountant', 'Part-time accountant position at a small accounting firm', 'Boston', 'part-time');
INSERT INTO jobs (title, description, location, type) VALUES ('Project Manager', 'Contract project management role for a construction company', 'Miami', 'contract');
INSERT INTO jobs (title, description, location, type) VALUES ('Sales Representative', 'Full-time sales representative position with travel opportunities', 'Remote', 'full-time');
INSERT INTO jobs (title, description, location, type) VALUES ('Software Engineer', 'In-office software engineering role at a tech startup', 'Seattle', 'full-time');
