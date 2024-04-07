CREATE TABLE jobs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    position VARCHAR(255),
    description TEXT,
    job_type VARCHAR(100)
);

INSERT INTO jobs (position, description, job_type) VALUES ('Software Engineer', 'This is a remote software engineering position', 'remote');
INSERT INTO jobs (position, description, job_type) VALUES ('Web Developer', 'Remote web development job available', 'remote');
INSERT INTO jobs (position, description, job_type) VALUES ('UI/UX Designer', 'Seeking a remote UI/UX designer for a project', 'remote');
INSERT INTO jobs (position, description, job_type) VALUES ('Data Analyst', 'Remote position for a data analyst with SQL skills', 'remote');
INSERT INTO jobs (position, description, job_type) VALUES ('Product Manager', 'Remote product management opportunity', 'remote');
INSERT INTO jobs (position, description, job_type) VALUES ('Frontend Developer', 'Remote frontend developer position', 'remote');
INSERT INTO jobs (position, description, job_type) VALUES ('Mobile App Developer', 'Looking for a remote mobile app developer', 'remote');
INSERT INTO jobs (position, description, job_type) VALUES ('Network Engineer', 'Remote network engineering position available', 'remote');
INSERT INTO jobs (position, description, job_type) VALUES ('Quality Assurance Tester', 'Remote QA testing job opportunity', 'remote');
INSERT INTO jobs (position, description, job_type) VALUES ('Technical Support Specialist', 'Remote technical support role open', 'remote');
