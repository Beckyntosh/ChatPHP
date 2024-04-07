CREATE TABLE IF NOT EXISTS job_listings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(250) NOT NULL,
    description TEXT,
    type VARCHAR(50),
    location VARCHAR(100),
    is_remote BOOLEAN DEFAULT false,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

INSERT INTO job_listings (title, description, type, location, is_remote) VALUES ('Senior PHP Developer', 'Remote senior PHP developer needed.', 'Full-time', 'Remote', 1);
INSERT INTO job_listings (title, description, type, location, is_remote) VALUES ('Junior Web Designer', 'Entry-level web designer position.', 'Part-time', 'New York', 0);
INSERT INTO job_listings (title, description, type, location, is_remote) VALUES ('Marketing Manager', 'Experienced marketing manager needed.', 'Full-time', 'London', 0);
INSERT INTO job_listings (title, description, type, location, is_remote) VALUES ('Graphic Designer', 'Creative graphic designer position.', 'Freelance', 'Remote', 1);
INSERT INTO job_listings (title, description, type, location, is_remote) VALUES ('Data Analyst', 'Data analyst with SQL skills required.', 'Contract', 'Chicago', 0);
INSERT INTO job_listings (title, description, type, location, is_remote) VALUES ('UX/UI Designer', 'User experience designer position.', 'Full-time', 'Los Angeles', 0);
INSERT INTO job_listings (title, description, type, location, is_remote) VALUES ('IT Support Specialist', 'Technical support specialist needed.', 'Part-time', 'Remote', 1);
INSERT INTO job_listings (title, description, type, location, is_remote) VALUES ('Sales Representative', 'Sales rep with experience in tech industry.', 'Full-time', 'San Francisco', 0);
INSERT INTO job_listings (title, description, type, location, is_remote) VALUES ('Software Engineer', 'Experienced software engineer position.', 'Full-time', 'Seattle', 0);
INSERT INTO job_listings (title, description, type, location, is_remote) VALUES ('Content Writer', 'Creative content writer for web content.', 'Contract', 'Remote', 1);