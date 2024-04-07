CREATE TABLE IF NOT EXISTS jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(100) NOT NULL,
    is_remote BOOLEAN DEFAULT false,
    keywords VARCHAR(255),
    added_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO jobs (title, description, location, is_remote, keywords) VALUES ('Remote Software Engineer', 'Looking for talented software engineers to join our remote team.', 'Remote', 1, 'software, engineer'),
('Web Developer', 'Seeking web developers with experience in HTML, CSS, and JavaScript.', 'New York', 0, 'web, developer'),
('Data Analyst', 'Data analysis position for individuals with strong analytical skills.', 'Los Angeles', 0, 'data, analyst'),
('Graphic Designer', 'Creative graphic designers needed to work on exciting projects.', 'London', 0, 'graphic, designer'),
('Marketing Specialist', 'Looking for a marketing specialist to drive our campaigns.', 'Chicago', 0, 'marketing, specialist'),
('Customer Support Representative', 'Join our team as a customer support representative.', 'Miami', 0, 'customer, support'),
('Project Manager', 'Experienced project managers required for organizing and leading teams.', 'San Francisco', 0, 'project, manager'),
('Sales Executive', 'Seeking dynamic sales executives to drive revenue growth.', 'Remote', 1, 'sales, executive'),
('UI/UX Designer', 'User interface and user experience designers needed for user-centric projects.', 'Paris', 0, 'UI, UX'),
('Software Developer', 'Software developers wanted to build innovative solutions.', 'Berlin', 0, 'software, developer');
