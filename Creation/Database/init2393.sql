CREATE TABLE IF NOT EXISTS volunteers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL UNIQUE,
  event VARCHAR(100) NOT NULL,
  registration_date TIMESTAMP
);

INSERT INTO volunteers (name, email, event) VALUES 
('Alice', 'alice@example.com', 'Local Charity Event'),
('Bob', 'bob@example.com', 'Community Clean-up'),
('Charlie', 'charlie@example.com', 'Food Drive'),
('David', 'david@example.com', 'Blood Donation Camp'),
('Emma', 'emma@example.com', 'Fundraising Gala'),
('Frank', 'frank@example.com', 'Environmental Awareness Campaign'),
('Grace', 'grace@example.com', 'Animal Shelter Volunteering'),
('Henry', 'henry@example.com', 'Mentoring Program'),
('Ivy', 'ivy@example.com', 'Community Garden Project'),
('Jack', 'jack@example.com', 'Elderly Care Program');
