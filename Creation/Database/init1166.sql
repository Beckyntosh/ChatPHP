CREATE TABLE IF NOT EXISTS jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(100),
    type ENUM('full-time', 'part-time', 'remote') NOT NULL,
    category ENUM('software', 'customer support', 'design', 'marketing') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO jobs (title, description, location, type, category) VALUES ('Remote Software Engineer', 'Seeking a skilled remote software engineer to join our team.', 'Remote', 'full-time', 'software');
INSERT INTO jobs (title, description, location, type, category) VALUES ('Customer Support Specialist', 'Customer support role for our growing customer base.', 'Local', 'part-time', 'customer support');
INSERT INTO jobs (title, description, location, type, category) VALUES ('UI/UX Designer', 'Design and improve user interfaces for our innovative projects.', 'Remote', 'full-time', 'design');
INSERT INTO jobs (title, description, location, type, category) VALUES ('Digital Marketing Manager', 'Lead digital marketing efforts to drive engagement and sales.', 'Local', 'full-time', 'marketing');
INSERT INTO jobs (title, description, location, type, category) VALUES ('Backend Developer', 'Work on backend systems for scalability and efficiency.', 'Remote', 'full-time', 'software');
INSERT INTO jobs (title, description, location, type, category) VALUES ('Product Manager', 'Manage the product lifecycle and roadmap for exciting projects.', 'Local', 'full-time', 'marketing');
INSERT INTO jobs (title, description, location, type, category) VALUES ('Frontend Developer', 'Create user-facing features with intuitive designs.', 'Remote', 'part-time', 'software');
INSERT INTO jobs (title, description, location, type, category) VALUES ('Marketing Analyst', 'Analyze marketing data and trends for strategic insights.', 'Local', 'full-time', 'marketing');
INSERT INTO jobs (title, description, location, type, category) VALUES ('Software Tester', 'Ensure product quality through comprehensive testing processes.', 'Remote', 'part-time', 'software');
INSERT INTO jobs (title, description, location, type, category) VALUES ('Graphic Designer', 'Bring creativity and visual appeal to marketing materials.', 'Local', 'full-time', 'design');

