CREATE TABLE IF NOT EXISTS job_listings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    location VARCHAR(150),
    is_remote BOOLEAN DEFAULT false,
    category VARCHAR(100)
);

INSERT INTO job_listings (title, description, location, is_remote, category) VALUES
("Software Developer", "Looking for a skilled software developer to join our team", "New York, NY", false, "Technology"),
("Graphic Designer", "Creative individual with experience in graphic design", "Los Angeles, CA", true, "Design"),
("Marketing Manager", "Seeking a talented marketing professional to drive our campaigns", "Chicago, IL", false, "Marketing"),
("Data Analyst", "Analytical mind needed to analyze data and generate insights", "San Francisco, CA", false, "Analytics"),
("Customer Service Representative", "Handle customer inquiries and provide support", "Remote", true, "Customer Service"),
("Sales Associate", "Join our sales team and drive revenue growth", "Dallas, TX", false, "Sales"),
("Accountant", "Manage financial records and ensure accuracy in reporting", "Miami, FL", false, "Finance"),
("HR Coordinator", "Support HR functions and assist with employee relations", "Remote", true, "Human Resources"),
("Content Writer", "Create engaging content for our website and marketing materials", "Seattle, WA", false, "Content"),
("Product Manager", "Lead product development and strategy for innovative products", "Boston, MA", false, "Product Management");
