CREATE TABLE IF NOT EXISTS jobs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  location VARCHAR(255) NOT NULL,
  is_remote BOOLEAN NOT NULL DEFAULT 0,
  technology VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert 10 values into the Jobs table
INSERT INTO jobs (title, description, location, is_remote, technology) VALUES 
('Remote Software Engineer', 'Description 1', 'New York', 1, 'Software Engineering'),
('Web Developer', 'Description 2', 'Los Angeles', 0, 'Web Development'),
('Data Scientist', 'Description 3', 'San Francisco', 1, 'Data Science'),
('UI/UX Designer', 'Description 4', 'Chicago', 0, 'Design'),
('Network Administrator', 'Description 5', 'Miami', 1, 'Networking'),
('Mobile App Developer', 'Description 6', 'Seattle', 0, 'Mobile Development'),
('Cybersecurity Analyst', 'Description 7', 'Boston', 1, 'Cybersecurity'),
('Database Administrator', 'Description 8', 'Austin', 0, 'Database Management'),
('AI/Machine Learning Engineer', 'Description 9', 'Denver', 1, 'AI/ML'),
('Full Stack Developer', 'Description 10', 'Atlanta', 0, 'Full Stack Development');
