CREATE TABLE IF NOT EXISTS jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(100),
    is_remote BOOLEAN DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO jobs (title, description, location, is_remote) VALUES ('Software Engineer', 'Develop software applications', 'Remote', 1);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('Web Developer', 'Design and develop websites', 'New York', 0);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('Data Analyst', 'Analyze and interpret data', 'Chicago', 0);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('UX Designer', 'Create user-friendly interfaces', 'San Francisco', 1);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('Product Manager', 'Manage product development process', 'Remote', 1);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('Marketing Specialist', 'Develop marketing campaigns', 'Los Angeles', 0);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('Graphic Designer', 'Design visual concepts', 'Miami', 0);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('Customer Support Representative', 'Provide customer assistance', 'Remote', 1);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('Sales Associate', 'Promote and sell products', 'Houston', 0);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('Financial Analyst', 'Analyze financial data', 'Dallas', 0);
