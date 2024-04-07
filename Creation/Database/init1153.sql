CREATE TABLE job_positions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(100) NOT NULL,
    type VARCHAR(50) NOT NULL,
    status VARCHAR(10) DEFAULT 'active'
);

-- Insert sample data into job_positions table
INSERT INTO job_positions (title, description, location, type) VALUES ('Remote Software Engineer', 'We are looking for a skilled software engineer to work remotely on exciting projects.', 'Remote', 'Software Engineer');
INSERT INTO job_positions (title, description, location, type) VALUES ('Onsite Graphic Designer', 'Seeking a talented graphic designer to join our onsite team.', 'New York City', 'Graphic Designer');
INSERT INTO job_positions (title, description, location, type) VALUES ('Remote Data Analyst', 'Join our team as a remote data analyst and help us make informed decisions.', 'Remote', 'Data Analyst');
INSERT INTO job_positions (title, description, location, type) VALUES ('Onsite Marketing Specialist', 'Looking for a marketing specialist to work in our office.', 'Los Angeles', 'Marketing');
INSERT INTO job_positions (title, description, location, type) VALUES ('Remote Content Writer', 'Work from anywhere as a content writer and create engaging articles.', 'Remote', 'Content Writer');
INSERT INTO job_positions (title, description, location, type) VALUES ('Onsite Sales Representative', 'Join our onsite team as a sales representative and drive revenue.', 'Chicago', 'Sales');
INSERT INTO job_positions (title, description, location, type) VALUES ('Remote Project Manager', 'Manage projects remotely and ensure timely delivery.', 'Remote', 'Project Manager');
INSERT INTO job_positions (title, description, location, type) VALUES ('Onsite IT Support Specialist', 'Provide onsite technical support to our team members.', 'San Francisco', 'IT Support');
INSERT INTO job_positions (title, description, location, type) VALUES ('Remote Customer Service Representative', 'Handle customer inquiries and issues from a remote location.', 'Remote', 'Customer Service');
INSERT INTO job_positions (title, description, location, type) VALUES ('Onsite HR Coordinator', 'Join our HR team onsite and manage employee relations.', 'Houston', 'HR Coordinator');
