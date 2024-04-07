CREATE TABLE job_listings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    location VARCHAR(100),
    is_remote BOOLEAN DEFAULT false,
    technology VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO job_listings (title, description, location, is_remote, technology) 
VALUES ('Software Developer', 'Create cutting-edge software applications.', 'New York', 0, 'PHP'),
       ('Remote Software Engineer', 'Develop and maintain PHP based applications.', 'Remote', 1, 'PHP'),
       ('Backend Developer', 'Focus on server-side logic and integration.', 'California', 0, 'PHP'),
       ('Frontend Developer', 'Design and build user-friendly interfaces.', 'Seattle', 0, 'JavaScript'),
       ('Data Scientist', 'Analyze complex data sets to generate insights.', 'Chicago', 0, 'Python'),
       ('Network Engineer', 'Manage and optimize network infrastructure.', 'Houston', 0, 'Cisco'),
       ('UX/UI Designer', 'Create visually appealing and user-friendly designs.', 'Boston', 0, 'Figma'),
       ('QA Analyst', 'Ensure software quality through testing and analysis.', 'Dallas', 0, 'Selenium'),
       ('DevOps Engineer', 'Automate and streamline software delivery.', 'Austin', 0, 'Docker'),
       ('Business Analyst', 'Study business processes and recommend improvements.', 'San Francisco', 0, 'SQL');
