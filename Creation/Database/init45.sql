CREATE TABLE IF NOT EXISTS jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    job_title VARCHAR(255) NOT NULL,
    job_description TEXT NOT NULL,
    job_type ENUM('full-time', 'part-time', 'remote') NOT NULL,
    skills_required VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO jobs (job_title, job_description, job_type, skills_required, reg_date) VALUES 
('Remote Software Developer', 'Looking for a skilled remote developer', 'remote', 'PHP, MySQL, HTML, CSS, JavaScript', NOW()),
('Full Stack Engineer', 'Full-time position for a talented developer', 'full-time', 'Ruby, Rails, Postgres, React', NOW()),
('Part-time Graphic Designer', 'Need a creative individual for part-time design work', 'part-time', 'Photoshop, Illustrator, InDesign', NOW()),
('Remote Project Manager', 'Experienced project manager for remote position', 'remote', 'Scrum, Agile, JIRA', NOW()),
('Front-end Developer', 'Seeking front-end developer for full-time role', 'full-time', 'HTML, CSS, JavaScript, React', NOW()),
('UX/UI Designer', 'UI/UX designer needed for exciting projects', 'full-time', 'Adobe XD, Sketch, Prototyping', NOW()),
('Remote Data Analyst', 'Analyzing data remotely for insights', 'remote', 'Excel, SQL, Tableau', NOW()),
('Digital Marketing Specialist', 'Full-time marketing role for a digital expert', 'full-time', 'SEO, SEM, Social Media', NOW()),
('Part-time Content Writer', 'Creative writer needed for part-time content creation', 'part-time', 'Copywriting, Editing, SEO', NOW()),
('Remote IT Support Specialist', 'Providing remote technical support services', 'remote', 'Networking, Troubleshooting, Helpdesk', NOW());
