CREATE TABLE IF NOT EXISTS jobs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
description TEXT NOT NULL,
is_remote BOOLEAN NOT NULL,
technology VARCHAR(50),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO jobs (title, description, is_remote, technology) VALUES ('Remote Software Developer', 'Looking for a remote software developer to join our team', 1, 'Java');
INSERT INTO jobs (title, description, is_remote, technology) VALUES ('Web Designer', 'Web designer needed for a design agency', 0, 'HTML/CSS');
INSERT INTO jobs (title, description, is_remote, technology) VALUES ('Data Analyst', 'Data analyst position open for someone familiar with R programming', 1, 'R');
INSERT INTO jobs (title, description, is_remote, technology) VALUES ('Mobile App Developer', 'Seeking a mobile app developer for Android and iOS platforms', 1, 'Swift');
INSERT INTO jobs (title, description, is_remote, technology) VALUES ('Network Engineer', 'Network engineer needed for a telecommunications company', 0, 'Cisco');
INSERT INTO jobs (title, description, is_remote, technology) VALUES ('Project Manager', 'Project manager position available for a software development project', 0, 'Agile');
INSERT INTO jobs (title, description, is_remote, technology) VALUES ('Graphic Designer', 'Graphic designer needed for a marketing agency', 0, 'Adobe Creative Suite');
INSERT INTO jobs (title, description, is_remote, technology) VALUES ('Database Administrator', 'Database administrator position open for an enterprise organization', 0, 'SQL');
INSERT INTO jobs (title, description, is_remote, technology) VALUES ('Quality Assurance Tester', 'Quality assurance tester required for software testing team', 1, 'Selenium');
INSERT INTO jobs (title, description, is_remote, technology) VALUES ('UI/UX Designer', 'UI/UX designer needed for a software startup company', 1, 'Figma');
