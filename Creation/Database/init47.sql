CREATE TABLE jobs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    position_type VARCHAR(50) NOT NULL
);

INSERT INTO jobs (title, description, position_type) VALUES 
('Software Engineer', 'Looking for a talented software engineer to join our team', 'remote'),
('Web Developer', 'Exciting opportunity for a web developer', 'on-site'),
('Data Analyst', 'Seeking a data analyst for a remote position', 'remote'),
('UI/UX Designer', 'Join our team as a UI/UX designer', 'on-site'),
('Project Manager', 'Exciting project management opportunity', 'remote'),
('Quality Assurance Specialist', 'Join our QA team for an on-site role', 'on-site'),
('Marketing Coordinator', 'Remote marketing coordinator needed', 'remote'),
('Network Administrator', 'Seeking a network admin for an on-site role', 'on-site'),
('Customer Support Specialist', 'Join our team as a customer support specialist', 'remote'),
('Graphic Designer', 'Exciting graphic design position available', 'on-site');
