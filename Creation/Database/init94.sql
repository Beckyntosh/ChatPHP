CREATE TABLE IF NOT EXISTS job_listings (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  location VARCHAR(100),
  is_remote BOOLEAN DEFAULT false,
  technology VARCHAR(100),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO job_listings (title, description, location, is_remote, technology) VALUES ('Remote Software Engineer', 'Looking for a highly skilled software engineer to work remotely on our projects.', 'Anywhere', 1, 'Software Engineering');
INSERT INTO job_listings (title, description, location, is_remote, technology) VALUES ('Graphic Designer', 'In need of a talented graphic designer to join our team.', 'New York City', 0, 'Graphic Design');
INSERT INTO job_listings (title, description, location, is_remote, technology) VALUES ('iOS Developer', 'Seeking experienced iOS developers to work on our mobile applications.', 'San Francisco', 0, 'iOS');
INSERT INTO job_listings (title, description, location, is_remote, technology) VALUES ('Web Developer', 'Looking for motivated web developers to create cutting-edge websites.', 'London', 0, 'Web Development');
INSERT INTO job_listings (title, description, location, is_remote, technology) VALUES ('Data Scientist', 'Opportunity for a skilled data scientist to analyze and interpret complex data.', 'Remote', 1, 'Data Science');
INSERT INTO job_listings (title, description, location, is_remote, technology) VALUES ('UI/UX Designer', 'Join our team to design seamless user interfaces and engaging user experiences.', 'Los Angeles', 0, 'UI/UX Design');
INSERT INTO job_listings (title, description, location, is_remote, technology) VALUES ('Full Stack Developer', 'Experienced full stack developers wanted to work on diverse projects.', 'Berlin', 0, 'Full Stack Development');
INSERT INTO job_listings (title, description, location, is_remote, technology) VALUES ('Digital Marketing Specialist', 'Seeking a digital marketing expert to drive online growth and engagement.', 'Chicago', 0, 'Digital Marketing');
INSERT INTO job_listings (title, description, location, is_remote, technology) VALUES ('Network Engineer', 'Join our team of network engineers to design and maintain secure networks.', 'Remote', 1, 'Network Engineering');
INSERT INTO job_listings (title, description, location, is_remote, technology) VALUES ('Machine Learning Engineer', 'Exciting opportunity for a machine learning engineer to innovate in AI field.', 'Tokyo', 0, 'Machine Learning');
