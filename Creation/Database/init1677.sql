CREATE TABLE IF NOT EXISTS courses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(250) NOT NULL,
    category VARCHAR(50) NOT NULL,
    description TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO courses (title, category, description) VALUES
    ('Introduction to Data Science', 'Data Science', 'Learn the basics of data science.'),
    ('Intermediate Data Science', 'Data Science', 'Deep dive into data science topics.'),
    ('Advanced Data Science', 'Data Science', 'Become a Data Science expert.'),
    ('Machine Learning Fundamentals', 'Data Science', 'Understand the basics of machine learning.'),
    ('Big Data Analytics', 'Data Science', 'Explore big data analytics techniques.'),
    ('Data Visualization Techniques', 'Data Science', 'Learn effective data visualization methods.'),
    ('Statistical Analysis for Data Science', 'Data Science', 'Master statistical analysis for data science.'),
    ('Python Programming for Data Science', 'Data Science', 'Develop programming skills in Python for data science.'),
    ('Natural Language Processing', 'Data Science', 'Study natural language processing techniques.'),
    ('Deep Learning Concepts', 'Data Science', 'Explore deep learning concepts and applications.');
