CREATE TABLE IF NOT EXISTS Courses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    courseName VARCHAR(255) NOT NULL,
    instructorName VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    courseId INT(6) UNSIGNED,
    studentName VARCHAR(255) NOT NULL,
    rating INT(1),
    review TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (courseId) REFERENCES Courses(id)
);

INSERT INTO Courses (courseName, instructorName) VALUES ('Mathematics 101', 'Professor Smith');
INSERT INTO Courses (courseName, instructorName) VALUES ('History of Art', 'Professor Johnson');
INSERT INTO Courses (courseName, instructorName) VALUES ('Computer Science Fundamentals', 'Professor Williams');
INSERT INTO Courses (courseName, instructorName) VALUES ('Literature and Poetry', 'Professor Brown');
INSERT INTO Courses (courseName, instructorName) VALUES ('Economics for Beginners', 'Professor Davis');

INSERT INTO Reviews (courseId, studentName, rating, review) VALUES (1, 'Alice', 5, 'Great course, highly recommended');
INSERT INTO Reviews (courseId, studentName, rating, review) VALUES (2, 'Bob', 4, 'Interesting content and engaging instructor');
INSERT INTO Reviews (courseId, studentName, rating, review) VALUES (3, 'Charlie', 3, 'Good course overall, but some topics were confusing');
INSERT INTO Reviews (courseId, studentName, rating, review) VALUES (4, 'Diana', 2, 'Not what I expected, the instructor was unorganized');
INSERT INTO Reviews (courseId, studentName, rating, review) VALUES (5, 'Eve', 1, 'Disappointing course, wouldnt recommend it');

INSERT INTO Reviews (courseId, studentName, rating, review) VALUES (1, 'Frank', 4, 'Enjoyed the material, but assignments were difficult');
INSERT INTO Reviews (courseId, studentName, rating, review) VALUES (2, 'Grace', 5, 'Fantastic course, learned a lot');
INSERT INTO Reviews (courseId, studentName, rating, review) VALUES (3, 'Henry', 3, 'Average course, could use more interactive exercises');
INSERT INTO Reviews (courseId, studentName, rating, review) VALUES (4, 'Ivy', 2, 'Instructor seemed uninterested, affected my motivation');
INSERT INTO Reviews (courseId, studentName, rating, review) VALUES (5, 'Jack', 1, 'Waste of time, didnt learn anything');
