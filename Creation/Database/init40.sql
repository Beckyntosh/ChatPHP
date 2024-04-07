CREATE TABLE IF NOT EXISTS JobListings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    position VARCHAR(100) NOT NULL,
    description TEXT,
    location VARCHAR(50),
    type VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO JobListings (position, description, location, type, reg_date) VALUES 
('Remote Software Developer', 'Description 1', 'Remote', 'Full-time', NOW()),
('Web Designer', 'Description 2', 'New York', 'Part-time', NOW()),
('Digital Marketer', 'Description 3', 'Los Angeles', 'Full-time', NOW()),
('Data Analyst', 'Description 4', 'Chicago', 'Contract', NOW()),
('iOS Developer', 'Description 5', 'San Francisco', 'Full-time', NOW()),
('Graphic Designer', 'Description 6', 'Remote', 'Part-time', NOW()),
('Customer Support Specialist', 'Description 7', 'Seattle', 'Contract', NOW()),
('Project Manager', 'Description 8', 'Boston', 'Full-time', NOW()),
('Social Media Manager', 'Description 9', 'Remote', 'Part-time', NOW()),
('UX/UI Designer', 'Description 10', 'Austin', 'Full-time', NOW());
