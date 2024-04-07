CREATE TABLE IF NOT EXISTS jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(100),
    is_remote BOOLEAN DEFAULT FALSE,
    category VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO jobs (title, description, location, is_remote, category) VALUES ('Software Engineer', 'Looking for a skilled software engineer to join our team', 'San Francisco', 0, 'Technology');
INSERT INTO jobs (title, description, location, is_remote, category) VALUES ('Graphic Designer', 'Creative and talented designer needed for our new project', 'New York', 1, 'Design');
INSERT INTO jobs (title, description, location, is_remote, category) VALUES ('Marketing Manager', 'Experienced marketing manager needed to lead our campaigns', 'Los Angeles', 0, 'Marketing');
INSERT INTO jobs (title, description, location, is_remote, category) VALUES ('Sales Representative', 'Dynamic individual to drive sales for our products', 'Chicago', 0, 'Sales');
INSERT INTO jobs (title, description, location, is_remote, category) VALUES ('Customer Support Specialist', 'Friendly and efficient support specialist to assist customers', 'Remote', 1, 'Customer Service');
INSERT INTO jobs (title, description, location, is_remote, category) VALUES ('HR Coordinator', 'Organized coordinator to manage human resources tasks', 'Boston', 0, 'Human Resources');
INSERT INTO jobs (title, description, location, is_remote, category) VALUES ('Web Developer', 'Talented web developer to enhance our online presence', 'Remote', 1, 'Technology');
INSERT INTO jobs (title, description, location, is_remote, category) VALUES ('Product Manager', 'Innovative product manager to drive our product strategy', 'Seattle', 0, 'Product Management');
INSERT INTO jobs (title, description, location, is_remote, category) VALUES ('Content Writer', 'Skilled content writer to create engaging copy for our website', 'Denver', 0, 'Writing');
INSERT INTO jobs (title, description, location, is_remote, category) VALUES ('Data Analyst', 'Analytical data analyst to provide insights from our data', 'Remote', 1, 'Analytics');
