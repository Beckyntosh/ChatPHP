CREATE TABLE IF NOT EXISTS jobs (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  location VARCHAR(50),
  is_remote BOOLEAN DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO jobs (title, description, location, is_remote) VALUES ('Remote Software Developer', 'PHP Developer', 'Anywhere', 1);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('Local Software Engineer', 'PHP Engineer', 'San Francisco', 0);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('Frontend Developer', 'JavaScript Developer', 'New York', 0);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('Software Engineer', 'Python Developer', 'Los Angeles', 1);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('Web Developer', 'HTML CSS Specialist', 'Chicago', 0);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('Data Scientist', 'Big Data Analyst', 'Seattle', 1);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('UX/UI Designer', 'User Experience Specialist', 'Boston', 0);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('Product Manager', 'Product Owner', 'Miami', 1);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('Network Engineer', 'IT Infrastructure Specialist', 'Dallas', 0);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('Cybersecurity Analyst', 'Security Specialist', 'Houston', 1);
