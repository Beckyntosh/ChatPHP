CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    category VARCHAR(255) NOT NULL
);

-- Create learning_paths table
CREATE TABLE IF NOT EXISTS learning_paths (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    courses_ids VARCHAR(255) NOT NULL
);

-- Insert dummy data into courses table
INSERT INTO courses (title, description, category) VALUES 
('Introduction to Data Science', 'Learn the basics of data science', 'Data Science'),
('Statistics for Data Science', 'Deep dive into statistics needed for data science', 'Data Science'),
('Machine Learning Concepts', 'Understanding ML concepts for data science', 'Data Science');
