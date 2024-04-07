CREATE TABLE IF NOT EXISTS jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    location VARCHAR(100),
    is_remote BOOLEAN,
    employment_type VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO jobs (title, description, location, is_remote, employment_type) VALUES ('Remote Software Engineer', 'Description for Remote Software Engineer position', 'Remote', 1, 'Full-time');
INSERT INTO jobs (title, description, location, is_remote, employment_type) VALUES ('Web Developer', 'Description for Web Developer position', 'New York', 0, 'Contract');
INSERT INTO jobs (title, description, location, is_remote, employment_type) VALUES ('Data Analyst', 'Description for Data Analyst position', 'California', 0, 'Part-time');
INSERT INTO jobs (title, description, location, is_remote, employment_type) VALUES ('UX Designer', 'Description for UX Designer position', 'Remote', 1, 'Full-time');
INSERT INTO jobs (title, description, location, is_remote, employment_type) VALUES ('Software Developer', 'Description for Software Developer position', 'Texas', 0, 'Full-time');
INSERT INTO jobs (title, description, location, is_remote, employment_type) VALUES ('Project Manager', 'Description for Project Manager position', 'Remote', 1, 'Contract');
INSERT INTO jobs (title, description, location, is_remote, employment_type) VALUES ('Quality Assurance Analyst', 'Description for Quality Assurance Analyst position', 'Washington', 0, 'Full-time');
INSERT INTO jobs (title, description, location, is_remote, employment_type) VALUES ('Graphic Designer', 'Description for Graphic Designer position', 'Remote', 1, 'Part-time');
INSERT INTO jobs (title, description, location, is_remote, employment_type) VALUES ('Product Manager', 'Description for Product Manager position', 'New Jersey', 0, 'Full-time');
INSERT INTO jobs (title, description, location, is_remote, employment_type) VALUES ('Marketing Specialist', 'Description for Marketing Specialist position', 'Remote', 1, 'Full-time');
