-- Create courses table
CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create learning_paths table
CREATE TABLE IF NOT EXISTS learning_paths (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    user_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create learning_path_courses table
CREATE TABLE IF NOT EXISTS learning_path_courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    learning_path_id INT,
    course_id INT,
    FOREIGN KEY (learning_path_id) REFERENCES learning_paths(id),
    FOREIGN KEY (course_id) REFERENCES courses(id)
);

-- Insert sample data into courses table
INSERT INTO courses (title, description) VALUES ('Mathematics', 'Basic math principles');
INSERT INTO courses (title, description) VALUES ('History', 'World history overview');
INSERT INTO courses (title, description) VALUES ('Science', 'Introduction to scientific concepts');
INSERT INTO courses (title, description) VALUES ('Literature', 'Classic and modern literature analysis');
INSERT INTO courses (title, description) VALUES ('Programming', 'Fundamentals of programming languages');
INSERT INTO courses (title, description) VALUES ('Art', 'Exploring different art styles');
INSERT INTO courses (title, description) VALUES ('Music', 'Music theory and history');
INSERT INTO courses (title, description) VALUES ('Languages', 'Learning different languages');
INSERT INTO courses (title, description) VALUES ('Psychology', 'Understanding human behavior');
INSERT INTO courses (title, description) VALUES ('Philosophy', 'Philosophical theories and thinkers');
