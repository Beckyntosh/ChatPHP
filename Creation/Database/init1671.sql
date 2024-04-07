CREATE TABLE IF NOT EXISTS courses (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(30) NOT NULL,
  category VARCHAR(30) NOT NULL,
  description TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS learning_paths (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(6) UNSIGNED NOT NULL,
  course_ids VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO courses (title, category, description) VALUES ('Introduction to Data Science', 'Data Science', 'Fundamental concepts in data science');
INSERT INTO courses (title, category, description) VALUES ('Machine Learning Basics', 'Data Science', 'Overview of machine learning algorithms');
INSERT INTO courses (title, category, description) VALUES ('Data Visualization Techniques', 'Data Science', 'Visualization tools and techniques');
INSERT INTO courses (title, category, description) VALUES ('Big Data Analytics', 'Data Science', 'Handling large datasets');
INSERT INTO courses (title, category, description) VALUES ('Natural Language Processing', 'Data Science', 'Text analysis and processing');
INSERT INTO courses (title, category, description) VALUES ('Deep Learning Fundamentals', 'Data Science', 'Neural networks and deep learning');
INSERT INTO courses (title, category, description) VALUES ('Advanced Data Science Projects', 'Data Science', 'Real-world data science projects');
INSERT INTO courses (title, category, description) VALUES ('Data Science Ethics', 'Data Science', 'Ethical considerations in data science');
INSERT INTO courses (title, category, description) VALUES ('Data Science Career Path', 'Data Science', 'Guidance for a career in data science');
INSERT INTO courses (title, category, description) VALUES ('Data Science Capstone Project', 'Data Science', 'Culminating project demonstrating data science skills');