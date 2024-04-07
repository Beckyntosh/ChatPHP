CREATE TABLE jobs (
    id INT PRIMARY KEY,
    job_title VARCHAR(255),
    job_description TEXT,
    job_type VARCHAR(50),
    location VARCHAR(100),
    salary DECIMAL(10, 2)
);

CREATE TABLE products (
    id INT PRIMARY KEY,
    product_name VARCHAR(255),
    product_type VARCHAR(50)
);

INSERT INTO jobs (id, job_title, job_description, job_type, location, salary) VALUES
(1, 'Remote Software Developer', 'Work as a developer from anywhere in the world', 'Full-time', 'Remote', 80000),
(2, 'Frontend Engineer', 'Looking for a frontend developer with experience in React', 'Full-time', 'New York', 90000),
(3, 'UX Designer', 'Design user-friendly interfaces for our applications', 'Part-time', 'Los Angeles', 60000),
(4, 'Data Analyst', 'Analyzing data and generating insights for business decisions', 'Full-time', 'San Francisco', 85000),
(5, 'Digital Marketing Specialist', 'Create and manage digital marketing campaigns', 'Full-time', 'Chicago', 75000),
(6, 'IT Support Specialist', 'Provide technical support to internal and external stakeholders', 'Contract', 'Remote', 60000),
(7, 'Software Engineer', 'Developing software solutions for clients', 'Full-time', 'Seattle', 90000),
(8, 'Backend Developer', 'Build and maintain backend systems for web applications', 'Full-time', 'Boston', 85000),
(9, 'Product Manager', 'Lead product development and launch strategies', 'Full-time', 'Austin', 95000),
(10, 'Customer Service Representative', 'Assist customers with product inquiries and issues', 'Part-time', 'Miami', 50000);

INSERT INTO products (id, product_name, product_type) VALUES
(1, 'Vintage Dress', 'Clothing'),
(2, 'Retro T-shirt', 'Clothing'),
(3, 'Classic Jeans', 'Clothing'),
(4, 'Old-school Sneakers', 'Footwear'),
(5, 'Throwback Jacket', 'Clothing'),
(6, 'Vintage Sunglasses', 'Accessories'),
(7, '90s Style Hat', 'Accessories'),
(8, 'Vintage Denim Skirt', 'Clothing'),
(9, 'Retro Hoodie', 'Clothing'),
(10, 'Vintage Band T-shirt', 'Clothing');