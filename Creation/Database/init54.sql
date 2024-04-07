CREATE TABLE IF NOT EXISTS jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(100) NOT NULL,
    is_remote BOOLEAN DEFAULT false,
    technology VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO jobs (title, description, location, is_remote, technology, reg_date) VALUES 
('Remote Software Engineer', 'Description 1', 'New York', 1, 'PHP', NOW()),
('Web Developer', 'Description 2', 'Los Angeles', 0, 'JavaScript', NOW()),
('Data Scientist', 'Description 3', 'Chicago', 1, 'Python', NOW()),
('UI/UX Designer', 'Description 4', 'San Francisco', 0, 'CSS', NOW()),
('Backend Developer', 'Description 5', 'Seattle', 1, 'Java', NOW()),
('Frontend Engineer', 'Description 6', 'Austin', 0, 'HTML', NOW()),
('Network Administrator', 'Description 7', 'Boston', 1, 'C++', NOW()),
('Quality Assurance Analyst', 'Description 8', 'Denver', 0, 'SQL', NOW()),
('Mobile App Developer', 'Description 9', 'Atlanta', 1, 'Swift', NOW()),
('Database Administrator', 'Description 10', 'Miami', 0, 'MySQL', NOW());
