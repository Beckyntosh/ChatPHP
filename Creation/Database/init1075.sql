CREATE TABLE IF NOT EXISTS CourseFeedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    courseName VARCHAR(255) NOT NULL,
    participantName VARCHAR(255),
    rating INT(1),
    comment TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO CourseFeedback (courseName, participantName, rating, comment) VALUES ('Course A', 'John Doe', 4, 'Great course content');
INSERT INTO CourseFeedback (courseName, participantName, rating, comment) VALUES ('Course B', 'Jane Smith', 5, 'Excellent course delivery');
INSERT INTO CourseFeedback (courseName, participantName, rating, comment) VALUES ('Course C', 'Alice Brown', 3, 'Average course, could use improvements');
INSERT INTO CourseFeedback (courseName, participantName, rating, comment) VALUES ('Course D', 'Bob Johnson', 2, 'Disappointed with the course materials');
INSERT INTO CourseFeedback (courseName, participantName, rating, comment) VALUES ('Course E', 'Sarah Wilson', 5, 'Best course Ive taken so far');
INSERT INTO CourseFeedback (courseName, participantName, rating, comment) VALUES ('Course F', 'Mike Davis', 3, 'Decent course but could be more challenging');
INSERT INTO CourseFeedback (courseName, participantName, rating, comment) VALUES ('Course G', 'Eva Martinez', 4, 'Enjoyed the interactive elements of the course');
INSERT INTO CourseFeedback (courseName, participantName, rating, comment) VALUES ('Course H', 'Chris Brown', 5, 'Highly recommended course for beginners');
INSERT INTO CourseFeedback (courseName, participantName, rating, comment) VALUES ('Course I', 'Laura Taylor', 4, 'Informative course content with practical examples');
INSERT INTO CourseFeedback (courseName, participantName, rating, comment) VALUES ('Course J', 'Alex Turner', 3, 'Some technical issues during the course');