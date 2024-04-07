CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    category VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT,
    user_id INT,
    rating INT,
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES courses(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO courses (title, description, category) VALUES ('Course 1', 'Description for Course 1', 'Category 1');
INSERT INTO courses (title, description, category) VALUES ('Course 2', 'Description for Course 2', 'Category 2');
INSERT INTO courses (title, description, category) VALUES ('Course 3', 'Description for Course 3', 'Category 3');
INSERT INTO courses (title, description, category) VALUES ('Course 4', 'Description for Course 4', 'Category 4');
INSERT INTO courses (title, description, category) VALUES ('Course 5', 'Description for Course 5', 'Category 5');
INSERT INTO courses (title, description, category) VALUES ('Course 6', 'Description for Course 6', 'Category 6');
INSERT INTO courses (title, description, category) VALUES ('Course 7', 'Description for Course 7', 'Category 7');
INSERT INTO courses (title, description, category) VALUES ('Course 8', 'Description for Course 8', 'Category 8');
INSERT INTO courses (title, description, category) VALUES ('Course 9', 'Description for Course 9', 'Category 9');
INSERT INTO courses (title, description, category) VALUES ('Course 10', 'Description for Course 10', 'Category 10');