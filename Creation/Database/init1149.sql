CREATE TABLE IF NOT EXISTS job_listings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    type VARCHAR(30) NOT NULL,
    location VARCHAR(50) DEFAULT 'remote',
    keywords TEXT,
    reg_date TIMESTAMP
);

INSERT INTO job_listings (title, description, type, location, keywords, reg_date) VALUES ('Software Engineer', 'Looking for a software engineer to join our team', 'Remote', 'Software, Engineer', CURRENT_TIMESTAMP);
INSERT INTO job_listings (title, description, type, location, keywords, reg_date) VALUES ('Web Developer', 'Seeking a web developer with experience in JavaScript', 'On-site', 'Web, Developer', CURRENT_TIMESTAMP);
INSERT INTO job_listings (title, description, type, location, keywords, reg_date) VALUES ('Data Analyst', 'Analyzing and interpreting complex data sets', 'Remote', 'Data, Analyst', CURRENT_TIMESTAMP);
INSERT INTO job_listings (title, description, type, location, keywords, reg_date) VALUES ('Project Manager', 'Manage project plans and timelines', 'On-site', 'Project, Manager', CURRENT_TIMESTAMP);
INSERT INTO job_listings (title, description, type, location, keywords, reg_date) VALUES ('Customer Support Specialist', 'Providing excellent customer service and resolving issues', 'Remote', 'Customer, Support', CURRENT_TIMESTAMP);
INSERT INTO job_listings (title, description, type, location, keywords, reg_date) VALUES ('UX Designer', 'Creating user-centric designs for websites and apps', 'Remote', 'UX, Designer', CURRENT_TIMESTAMP);
INSERT INTO job_listings (title, description, type, location, keywords, reg_date) VALUES ('Marketing Manager', 'Developing marketing strategies and campaigns', 'On-site', 'Marketing, Manager', CURRENT_TIMESTAMP);
INSERT INTO job_listings (title, description, type, location, keywords, reg_date) VALUES ('Sales Representative', 'Selling products and services to prospective clients', 'Remote', 'Sales, Representative', CURRENT_TIMESTAMP);
INSERT INTO job_listings (title, description, type, location, keywords, reg_date) VALUES ('Network Administrator', 'Managing and maintaining computer networks', 'On-site', 'Network, Administrator', CURRENT_TIMESTAMP);
INSERT INTO job_listings (title, description, type, location, keywords, reg_date) VALUES ('Graphic Designer', 'Creating visual concepts for various projects', 'Remote', 'Graphic, Designer', CURRENT_TIMESTAMP);
