CREATE TABLE IF NOT EXISTS Jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    job_title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(50),
    remote ENUM('yes', 'no') DEFAULT 'no',
    technology VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO Jobs (job_title, description, location, remote, technology) VALUES ('Remote Software Engineer', 'Job description for Remote Software Engineer position', 'Remote', 'yes', 'Software Engineering');
INSERT INTO Jobs (job_title, description, location, remote, technology) VALUES ('Web Developer', 'Job description for Web Developer position', 'On-site', 'no', 'Web Development');
INSERT INTO Jobs (job_title, description, location, remote, technology) VALUES ('Data Analyst', 'Job description for Data Analyst position', 'Remote', 'yes', 'Data Analysis');
INSERT INTO Jobs (job_title, description, location, remote, technology) VALUES ('UX Designer', 'Job description for UX Designer position', 'On-site', 'no', 'User Experience Design');
INSERT INTO Jobs (job_title, description, location, remote, technology) VALUES ('Full Stack Developer', 'Job description for Full Stack Developer position', 'Remote', 'yes', 'Full Stack Development');
INSERT INTO Jobs (job_title, description, location, remote, technology) VALUES ('Product Manager', 'Job description for Product Manager position', 'On-site', 'no', 'Product Management');
INSERT INTO Jobs (job_title, description, location, remote, technology) VALUES ('Data Scientist', 'Job description for Data Scientist position', 'Remote', 'yes', 'Data Science');
INSERT INTO Jobs (job_title, description, location, remote, technology) VALUES ('Mobile App Developer', 'Job description for Mobile App Developer position', 'On-site', 'no', 'Mobile App Development');
INSERT INTO Jobs (job_title, description, location, remote, technology) VALUES ('Systems Analyst', 'Job description for Systems Analyst position', 'Remote', 'yes', 'Systems Analysis');
INSERT INTO Jobs (job_title, description, location, remote, technology) VALUES ('Network Administrator', 'Job description for Network Administrator position', 'On-site', 'no', 'Network Administration');
