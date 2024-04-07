CREATE TABLE IF NOT EXISTS job_listing (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    location VARCHAR(100),
    type VARCHAR(50),
    salary DECIMAL(10, 2)
);

INSERT INTO job_listing (title, description, location, type, salary) VALUES 
("Software Engineer", "Developing software applications", "San Francisco", "Full-time", 85000.00),
("Marketing Specialist", "Creating marketing campaigns", "New York", "Part-time", 55000.00),
("Graphic Designer", "Designing visual content", "Los Angeles", "Contract", 45000.00),
("Accountant", "Managing financial records", "Chicago", "Full-time", 65000.00),
("HR Manager", "Handling human resources functions", "Houston", "Full-time", 70000.00),
("Sales Representative", "Selling products/services", "Miami", "Commission-based", 50000.00),
("Web Developer", "Building websites and web applications", "Seattle", "Full-time", 80000.00),
("Customer Support Specialist", "Assisting customers with queries", "Boston", "Full-time", 55000.00),
("Data Analyst", "Analyzing data for insights", "Dallas", "Full-time", 75000.00),
("Project Manager", "Coordinating project activities", "Atlanta", "Full-time", 70000.00);

CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    email VARCHAR(50)
);

CREATE TABLE products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(255),
    price DECIMAL(8,2) NOT NULL,
    image VARCHAR(255)
);
