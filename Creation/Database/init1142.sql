CREATE TABLE IF NOT EXISTS jobs (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(50) NOT NULL,
  description TEXT,
  location ENUM('remote', 'onsite'),
  technology VARCHAR(30),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO jobs (title, description, location, technology)
VALUES ('Remote Software Engineer', 'Description for Remote Software Engineer position', 'remote', 'Java'),
('Onsite Web Developer', 'Description for Onsite Web Developer position', 'onsite', 'Python'),
('Remote UX Designer', 'Description for Remote UX Designer position', 'remote', 'UI/UX'),
('Onsite Data Analyst', 'Description for Onsite Data Analyst position', 'onsite', 'SQL'),
('Remote Frontend Developer', 'Description for Remote Frontend Developer position', 'remote', 'JavaScript'),
('Onsite Network Administrator', 'Description for Onsite Network Administrator position', 'onsite', 'Cisco'),
('Remote Product Manager', 'Description for Remote Product Manager position', 'remote', 'Product Management'),
('Onsite Cybersecurity Specialist', 'Description for Onsite Cybersecurity Specialist position', 'onsite', 'Cybersecurity'),
('Remote AI Engineer', 'Description for Remote AI Engineer position', 'remote', 'Artificial Intelligence'),
('Onsite DevOps Engineer', 'Description for Onsite DevOps Engineer position', 'onsite', 'Cloud Computing');