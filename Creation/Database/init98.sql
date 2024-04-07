CREATE TABLE IF NOT EXISTS jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(50),
    type ENUM('full-time', 'part-time', 'remote') DEFAULT 'full-time',
    category ENUM('Software', 'Design', 'Customer Support', 'Finance', 'Marketing') DEFAULT 'Software',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO jobs (title, description, location, type, category) VALUES ('Senior Software Engineer', 'Looking for an experienced software engineer to join our team.', 'New York', 'full-time', 'Software');
INSERT INTO jobs (title, description, location, type, category) VALUES ('Graphic Designer', 'Exciting opportunity for a talented designer to work on creative projects.', 'Los Angeles', 'part-time', 'Design');
INSERT INTO jobs (title, description, location, type, category) VALUES ('Customer Support Specialist', 'Seeking a friendly and knowledgeable individual to assist our customers.', 'Remote', 'full-time', 'Customer Support');
INSERT INTO jobs (title, description, location, type, category) VALUES ('Financial Analyst', 'Join our finance team to analyze data and provide insights.', 'Chicago', 'full-time', 'Finance');
INSERT INTO jobs (title, description, location, type, category) VALUES ('Marketing Coordinator', 'Help us develop and execute marketing campaigns to reach our audience.', 'San Francisco', 'part-time', 'Marketing');
INSERT INTO jobs (title, description, location, type, category) VALUES ('Software Developer', 'Entry-level position for a software developer to gain experience.', 'Remote', 'full-time', 'Software');
INSERT INTO jobs (title, description, location, type, category) VALUES ('UI/UX Designer', 'Create visually appealing designs for user interfaces.', 'Seattle', 'part-time', 'Design');
INSERT INTO jobs (title, description, location, type, category) VALUES ('Technical Support Engineer', 'Provide technical assistance to customers regarding our products.', 'Dallas', 'full-time', 'Customer Support');
INSERT INTO jobs (title, description, location, type, category) VALUES ('Financial Planner', 'Help individuals and organizations with financial planning strategies.', 'Remote', 'full-time', 'Finance');
INSERT INTO jobs (title, description, location, type, category) VALUES ('Digital Marketing Specialist', 'Implement digital marketing strategies to drive engagement and conversions.', 'Boston', 'part-time', 'Marketing');
