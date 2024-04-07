CREATE TABLE IF NOT EXISTS courses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS learning_paths (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    course_id INT(6) UNSIGNED,
    FOREIGN KEY (course_id) REFERENCES courses(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO courses (name, category, description) VALUES ('Python for Data Science', 'Data Science', 'Learn Python programming for data science');
INSERT INTO courses (name, category, description) VALUES ('Machine Learning Basics', 'Data Science', 'Introduction to machine learning concepts');
INSERT INTO courses (name, category, description) VALUES ('Data Visualization Techniques', 'Data Science', 'Explore various data visualization tools');
INSERT INTO courses (name, category, description) VALUES ('Statistical Analysis for Data Science', 'Data Science', 'Understanding statistical methods for data analysis');
INSERT INTO courses (name, category, description) VALUES ('Big Data Management', 'Data Science', 'Managing and analyzing large datasets');
INSERT INTO courses (name, category, description) VALUES ('Deep Learning Fundamentals', 'Data Science', 'Introduction to deep learning algorithms');
INSERT INTO courses (name, category, description) VALUES ('Data Mining Techniques', 'Data Science', 'Exploring data mining algorithms');
INSERT INTO courses (name, category, description) VALUES ('Natural Language Processing', 'Data Science', 'NLP for text data analysis');
INSERT INTO courses (name, category, description) VALUES ('AI Ethics and Bias', 'Data Science', 'Understanding ethical considerations in AI');
INSERT INTO courses (name, category, description) VALUES ('Capstone Project', 'Data Science', 'Apply learned skills in a real-world project');

