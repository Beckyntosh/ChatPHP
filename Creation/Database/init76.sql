-- init.sql

CREATE DATABASE IF NOT EXISTS my_database;
USE my_database;

CREATE TABLE job_listings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    type VARCHAR(100),
    location VARCHAR(255),
    description TEXT,
    posted_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO job_listings (title, type, location, description) VALUES
('Graphic Designer', 'full-time', 'New York', 'Looking for a skilled graphic designer.'),
('Web Developer', 'full-time', 'Remote', 'Web developer with 5 years of experience.'),
('Content Writer', 'part-time', 'Remote', 'Content writer for art supplies blog.'),
('Digital Marketing Specialist', 'full-time', 'London', 'Expert in digital marketing.'),
('SEO Expert', 'remote', 'Remote', 'Experienced SEO expert.'),
('Product Manager', 'full-time', 'Berlin', 'Seeking a creative product manager.'),
('Art Supplies Sales Representative', 'part-time', 'San Francisco', 'Sales representative with art knowledge.'),
('Customer Service Representative', 'remote', 'Remote', 'Remote customer service representative.'),
('E-commerce Analyst', 'full-time', 'Remote', 'Analyzing e-commerce data.'),
('Graphic Artist', 'freelance', 'Remote', 'Freelance graphic artist for project work.');
