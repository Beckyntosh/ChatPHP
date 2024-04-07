CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL
);

-- Insert data into courses table
INSERT INTO courses (name, category) VALUES ('Machine Learning Basics', 'Data Science');
INSERT INTO courses (name, category) VALUES ('Data Visualization', 'Data Science');
INSERT INTO courses (name, category) VALUES ('Statistical Analysis', 'Data Science');
INSERT INTO courses (name, category) VALUES ('Big Data Management', 'Data Science');
INSERT INTO courses (name, category) VALUES ('Deep Learning', 'Data Science');
INSERT INTO courses (name, category) VALUES ('Python for Data Science', 'Data Science');
INSERT INTO courses (name, category) VALUES ('R Programming', 'Data Science');
INSERT INTO courses (name, category) VALUES ('Data Mining Techniques', 'Data Science');
INSERT INTO courses (name, category) VALUES ('Predictive Analytics', 'Data Science');
INSERT INTO courses (name, category) VALUES ('Data Science Capstone Project', 'Data Science');

-- Create learning_paths table
CREATE TABLE IF NOT EXISTS learning_paths (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    course_ids VARCHAR(255) NOT NULL,
    path_name VARCHAR(255) NOT NULL
);
