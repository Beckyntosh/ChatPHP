CREATE TABLE IF NOT EXISTS job_listings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    description TEXT,
    is_remote BOOLEAN,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert sample data into job_listings table
INSERT INTO job_listings (title, description, is_remote) VALUES ('Remote Software Developer', 'Work from anywhere as a software developer', 1);
INSERT INTO job_listings (title, description, is_remote) VALUES ('Web Designer', 'Design websites for clients', 0);
INSERT INTO job_listings (title, description, is_remote) VALUES ('Data Analyst', 'Analyzing data to provide insights', 0);
INSERT INTO job_listings (title, description, is_remote) VALUES ('Graphic Designer', 'Creating graphics for various projects', 1);
INSERT INTO job_listings (title, description, is_remote) VALUES ('Content Writer', 'Write engaging content for websites', 1);
INSERT INTO job_listings (title, description, is_remote) VALUES ('Social Media Manager', 'Manage social media accounts for businesses', 0);
INSERT INTO job_listings (title, description, is_remote) VALUES ('Marketing Specialist', 'Develop and implement marketing strategies', 0);
INSERT INTO job_listings (title, description, is_remote) VALUES ('Customer Service Representative', 'Assist customers with queries and issues', 0);
INSERT INTO job_listings (title, description, is_remote) VALUES ('Accountant', 'Handle financial accounts and reports', 1);
INSERT INTO job_listings (title, description, is_remote) VALUES ('Sales Manager', 'Lead and manage sales team for company', 0);
