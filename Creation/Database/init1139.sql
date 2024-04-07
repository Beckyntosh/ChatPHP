CREATE TABLE IF NOT EXISTS jobs (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  location VARCHAR(100) NOT NULL,
  is_remote BOOLEAN NOT NULL default FALSE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO jobs (title, description, location, is_remote) VALUES ('Remote PHP Developer', 'Looking for a skilled PHP developer to join our remote team.', 'Remote', 1);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('Software Engineer', 'Seeking a software engineer to work on new projects.', 'New York', 0);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('Front-End Developer', 'Front-end developer needed for an exciting startup.', 'San Francisco', 0);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('Full Stack Developer', 'Join our team as a full stack developer working remotely.', 'Remote', 1);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('UX Designer', 'Looking for a talented UX designer to create engaging interfaces.', 'London', 0);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('Product Manager', 'Product manager role available for an experienced professional.', 'Remote', 1);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('Data Analyst', 'Data analyst position open for a growing analytics company.', 'Boston', 0);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('DevOps Engineer', 'Experienced DevOps engineer needed for infrastructure management.', 'Remote', 1);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('Mobile App Developer', 'Develop mobile apps for a leading tech company.', 'Seattle', 0);
INSERT INTO jobs (title, description, location, is_remote) VALUES ('Quality Assurance Tester', 'Join our QA team to ensure top-quality software products.', 'Remote', 1);
