CREATE TABLE IF NOT EXISTS courses (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  category VARCHAR(50),
  reg_date TIMESTAMP
);

INSERT INTO courses (title, description, category, reg_date) VALUES 
('Data Science Basics', 'Introduction to fundamental concepts in data science', 'Data Science', NOW()),
('Advanced Data Analysis', 'Deep dive into data analysis techniques', 'Data Science', NOW()),
('Machine Learning Fundamentals', 'Introduction to machine learning algorithms', 'Data Science', NOW()),
('Data Visualization Techniques', 'Tools and methods for visualizing data', 'Data Science', NOW()),
('Big Data Management', 'Handling and processing large datasets', 'Data Science', NOW()),
('Data Mining Essentials', 'Exploring patterns and insights in data', 'Data Science', NOW()),
('Statistics for Data Science', 'Statistical methods for data analysis', 'Data Science', NOW()),
('Python for Data Science', 'Programming basics in Python for data analysis', 'Data Science', NOW()),
('R Programming', 'Introduction to statistical computing with R', 'Data Science', NOW()),
('Deep Learning Concepts', 'Neural networks and deep learning principles', 'Data Science', NOW());

CREATE TABLE IF NOT EXISTS user_paths (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(6) UNSIGNED,
  course_id INT(6) UNSIGNED,
  reg_date TIMESTAMP,
  FOREIGN KEY (course_id) REFERENCES courses(id)
);
