CREATE TABLE IF NOT EXISTS jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(50),
    is_remote BOOLEAN DEFAULT false,
    technology VARCHAR(50),
    posted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert sample job listings
INSERT INTO jobs (title, description, location, is_remote, technology) VALUES
('Senior PHP Developer', 'Looking for an experienced PHP developer to join our team.', 'New York', false, 'PHP'),
('Frontend Developer', 'Frontend developer with a passion for design and usability.', 'Remote', true, 'JavaScript, CSS'),
('Java Engineer', 'Java engineer needed for enterprise application development.', 'San Francisco', false, 'Java'),
('Mobile Developer', 'Experienced mobile developer for both iOS and Android platforms.', 'Remote', true, 'Swift, Kotlin'),
('Data Scientist', 'Seeking a data scientist to analyze and interpret complex data.', 'Boston', false, 'Python, R'),
('DevOps Engineer', 'DevOps engineer with knowledge in cloud infrastructures.', 'Remote', true, 'AWS, Docker'),
('Project Manager', 'Digital project manager to oversee web projects.', 'Los Angeles', false, 'Agile, Scrum'),
('Graphic Designer', 'Creative graphic designer for marketing materials and digital content.', 'Remote', true, 'Adobe Creative Suite'),
('UX/UI Designer', 'UX/UI designer to improve website usability.', 'Austin', false, 'Sketch, Figma'),
('SEO Specialist', 'SEO specialist to enhance website visibility on search engines.', 'Remote', true, 'SEO, Google Analytics');

