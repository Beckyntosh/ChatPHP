CREATE TABLE IF NOT EXISTS job_listing (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    job_type VARCHAR(50) NOT NULL,
    location VARCHAR(100),
    remote BOOLEAN DEFAULT false,
    keywords TEXT,
    post_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO job_listing (title, description, job_type, location, remote, keywords) VALUES ('Software Engineer', 'Looking for a skilled software engineer to join our team', 'Full-time', 'New York', 0, 'software, engineer');
INSERT INTO job_listing (title, description, job_type, location, remote, keywords) VALUES ('Graphic Designer', 'Seeking a creative graphic designer for exciting projects', 'Part-time', 'Los Angeles', 1, 'graphic, designer');
INSERT INTO job_listing (title, description, job_type, location, remote, keywords) VALUES ('Data Analyst', 'Analyzing business data to provide insights and recommendations', 'Remote', 'San Francisco', 1, 'data, analyst');
INSERT INTO job_listing (title, description, job_type, location, remote, keywords) VALUES ('Project Manager', 'Coordinating project tasks and schedules for successful completion', 'Full-time', 'Chicago', 0, 'project, manager');
INSERT INTO job_listing (title, description, job_type, location, remote, keywords) VALUES ('Web Developer', 'Creating responsive and user-friendly websites for clients', 'Remote', 'Seattle', 1, 'web, developer');
INSERT INTO job_listing (title, description, job_type, location, remote, keywords) VALUES ('Marketing Coordinator', 'Implementing marketing strategies to promote company products', 'Part-time', 'Miami', 0, 'marketing, coordinator');
INSERT INTO job_listing (title, description, job_type, location, remote, keywords) VALUES ('HR Specialist', 'Managing employee relations and recruitment processes', 'Full-time', 'Boston', 0, 'HR, specialist');
INSERT INTO job_listing (title, description, job_type, location, remote, keywords) VALUES ('Accountant', 'Handling financial records and ensuring regulatory compliance', 'Remote', 'Denver', 1, 'accountant');
INSERT INTO job_listing (title, description, job_type, location, remote, keywords) VALUES ('Customer Service Representative', 'Assisting customers with inquiries and issue resolution', 'Full-time', 'Houston', 0, 'customer service');
INSERT INTO job_listing (title, description, job_type, location, remote, keywords) VALUES ('Sales Associate', 'Promoting and selling products in a retail setting', 'Part-time', 'Atlanta', 0, 'sales, retail');