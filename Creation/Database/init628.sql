CREATE TABLE job_listings (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    job_title VARCHAR(255) NOT NULL,
    job_description TEXT NOT NULL
);

INSERT INTO job_listings (job_title, job_description) VALUES
('Software Developer', 'We are looking for a skilled software developer to join our team.'),
('Marketing Coordinator', 'Seeking a dynamic individual to handle our marketing initiatives.'),
('Graphic Designer', 'Join our creative team as a graphic designer.'),
('Administrative Assistant', 'Assist with office tasks and operations.'),
('Sales Representative', 'Drive sales and grow our customer base.'),
('Customer Service Specialist', 'Provide excellent customer service and support.'),
('Financial Analyst', 'Analyze and forecast financial data.'),
('HR Manager', 'Manage human resources and employee relations.'),
('Project Manager', 'Coordinate project activities and deadlines.'),
('Operations Supervisor', 'Supervise daily operations and logistics.');