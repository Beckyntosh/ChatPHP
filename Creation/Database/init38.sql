CREATE TABLE jobs (
    id INT PRIMARY KEY,
    title VARCHAR(100),
    company VARCHAR(100),
    location VARCHAR(100),
    remote BOOLEAN
);

CREATE TABLE filters (
    id INT PRIMARY KEY,
    keyword VARCHAR(50),
    location VARCHAR(50),
    remote BOOLEAN
);

INSERT INTO jobs (id, title, company, location, remote) VALUES 
(1, 'Software Engineer', 'Tech Company A', 'New York', FALSE),
(2, 'Remote Graphic Designer', 'Design Studio B', 'Los Angeles', TRUE),
(3, 'Data Analyst', 'Data Corp', 'Chicago', FALSE),
(4, 'Web Developer', 'Web Solutions', 'Miami', FALSE),
(5, 'Remote Project Manager', 'Management Inc.', 'San Francisco', TRUE),
(6, 'Software Developer', 'Tech Firm C', 'Seattle', FALSE),
(7, 'UX Designer', 'Design Co.', 'Boston', FALSE),
(8, 'Remote Customer Service Rep', 'Service Company', 'Dallas', TRUE),
(9, 'Digital Marketer', 'Marketing Agency', 'Austin', FALSE),
(10, 'Remote Sales Representative', 'Sales Inc.', 'Atlanta', TRUE);

INSERT INTO filters (id, keyword, location, remote) VALUES 
(1, 'software engineer', 'New York', FALSE),
(2, 'graphic designer', 'Los Angeles', TRUE),
(3, 'data analyst', 'Chicago', FALSE),
(4, 'web developer', 'Miami', FALSE),
(5, 'project manager', 'San Francisco', TRUE),
(6, 'software developer', 'Seattle', FALSE),
(7, 'ux designer', 'Boston', FALSE),
(8, 'customer service', 'Dallas', TRUE),
(9, 'digital marketer', 'Austin', FALSE),
(10, 'sales representative', 'Atlanta', TRUE);