-- init.sql

CREATE DATABASE IF NOT EXISTS my_database;
USE my_database;

CREATE TABLE job_listings (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    type VARCHAR(50),
    location VARCHAR(50),
    description TEXT,
    posted_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO job_listings (title, type, location, description) VALUES
('Software Developer', 'Full-time', 'Remote', 'Develop innovative software solutions.'),
('Product Designer', 'Contract', 'Remote', 'Design state-of-the-art tablets.'),
('UX/UI Designer', 'Full-time', 'On-site', 'Craft compelling user interfaces for tablets.'),
('Project Manager', 'Part-time', 'Remote', 'Manage tablet development projects.'),
('Quality Assurance Engineer', 'Contract', 'Remote', 'Ensure the highest quality in tablet products.'),
('Technical Support Specialist', 'Full-time', 'On-site', 'Provide support for our tablet users.'),
('Marketing Coordinator', 'Part-time', 'Remote', 'Promote our latest tablet models.'),
('Sales Executive', 'Full-time', 'On-site', 'Drive sales for our innovative tablets.'),
('Content Writer', 'Contract', 'Remote', 'Create engaging content about tablets.'),
('Graphic Designer', 'Full-time', 'Remote', 'Design captivating visuals for tablet campaigns.');
