CREATE TABLE jobs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    location VARCHAR(100) NOT NULL,
    job_type VARCHAR(50) NOT NULL
);

INSERT INTO jobs (title, location, job_type) VALUES ('Remote Software Developer', 'Remote', 'Full-time');
INSERT INTO jobs (title, location, job_type) VALUES ('Frontend Developer', 'New York', 'Full-time');
INSERT INTO jobs (title, location, job_type) VALUES ('UX Designer', 'Chicago', 'Part-time');
INSERT INTO jobs (title, location, job_type) VALUES ('Data Analyst', 'Los Angeles', 'Contract');
INSERT INTO jobs (title, location, job_type) VALUES ('Project Manager', 'San Francisco', 'Full-time');
INSERT INTO jobs (title, location, job_type) VALUES ('Software Engineer', 'Boston', 'Full-time');
INSERT INTO jobs (title, location, job_type) VALUES ('Marketing Specialist', 'Seattle', 'Part-time');
INSERT INTO jobs (title, location, job_type) VALUES ('Graphic Designer', 'Miami', 'Full-time');
INSERT INTO jobs (title, location, job_type) VALUES ('Quality Assurance Tester', 'Remote', 'Contract');
INSERT INTO jobs (title, location, job_type) VALUES ('IT Support Specialist', 'Washington D.C.', 'Full-time');
