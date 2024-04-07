CREATE TABLE IF NOT EXISTS jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(255),
    is_remote BOOLEAN DEFAULT FALSE,
    category VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO jobs (title, description, location, is_remote, category) VALUES ('Remote Software Engineer', 'Looking for a talented software engineer to work remotely on cutting-edge projects', 'Remote', 1, 'Software Development');
INSERT INTO jobs (title, description, location, is_remote, category) VALUES ('Digital Marketing Specialist', 'Seeking skilled marketing professional for remote position with flexible hours', 'Remote', 1, 'Marketing');
INSERT INTO jobs (title, description, location, is_remote, category) VALUES ('Graphic Designer', 'Join our creative team to design amazing visuals for marketing campaigns', 'New York', 0, 'Design');
INSERT INTO jobs (title, description, location, is_remote, category) VALUES ('Sales Representative', 'Looking for dynamic individual to drive sales in the Sporting Goods industry', 'Los Angeles', 0, 'Sales');
INSERT INTO jobs (title, description, location, is_remote, category) VALUES ('Customer Support Specialist', 'Provide exceptional customer service and support for our products', 'Chicago', 0, 'Customer Service');
INSERT INTO jobs (title, description, location, is_remote, category) VALUES ('Product Manager', 'Lead our product development team and drive innovation in the market', 'San Francisco', 0, 'Product Management');
INSERT INTO jobs (title, description, location, is_remote, category) VALUES ('Web Developer', 'Create engaging websites and web applications for diverse clients', 'Austin', 0, 'Web Development');
INSERT INTO jobs (title, description, location, is_remote, category) VALUES ('HR Coordinator', 'Assist in recruitment and employee relations activities in a dynamic organization', 'Seattle', 0, 'Human Resources');
INSERT INTO jobs (title, description, location, is_remote, category) VALUES ('Finance Analyst', 'Analyze financial data and provide insights to drive business decisions', 'New York', 0, 'Finance');
INSERT INTO jobs (title, description, location, is_remote, category) VALUES ('Content Writer', 'Craft compelling content for digital platforms and engage audiences', 'Remote', 1, 'Content Creation');
