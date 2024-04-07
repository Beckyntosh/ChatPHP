CREATE TABLE IF NOT EXISTS job_listings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(50),
    remote ENUM('yes', 'no') DEFAULT 'no',
    posted_date DATE,
    category VARCHAR(50)
);

INSERT INTO job_listings (title, description, location, remote, posted_date, category) VALUES 
('Senior Software Engineer', 'Looking for experienced software engineer for remote position', 'California', 'yes', '2022-10-15', 'Software Development'),
('Marketing Manager', 'Seeking marketing professional with experience in digital and traditional marketing', 'New York', 'no', '2022-10-10', 'Marketing'),
('Project Manager', 'Project manager needed for construction company based in Texas', 'Texas', 'no', '2022-10-12', 'Project Management'),
('Graphic Designer', 'Creative graphic designer for design agency in Los Angeles', 'California', 'no', '2022-10-14', 'Design'),
('Data Analyst', 'Data analyst position available for remote work', 'Remote', 'yes', '2022-10-13', 'Data Analysis'),
('HR Specialist', 'HR specialist required for in-office position in Chicago', 'Chicago', 'no', '2022-10-11', 'Human Resources'),
('Customer Service Representative', 'Customer service role with opportunities for remote work', 'New York', 'yes', '2022-10-09', 'Customer Service'),
('Financial Analyst', 'Experienced financial analyst needed for financial services company', 'New Jersey', 'no', '2022-10-08', 'Finance'),
('Legal Assistant', 'Legal assistant position available for in-office work', 'Washington D.C.', 'no', '2022-10-07', 'Legal'),
('Product Manager', 'Product manager role for tech startup in Silicon Valley', 'California', 'no', '2022-10-06', 'Product Management');
