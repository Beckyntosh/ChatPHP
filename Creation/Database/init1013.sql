CREATE TABLE IF NOT EXISTS Classes (
    class_id INT AUTO_INCREMENT PRIMARY KEY, 
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
);
CREATE TABLE IF NOT EXISTS Instructors (
    instructor_id INT AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(255) NOT NULL
);
CREATE TABLE IF NOT EXISTS Reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    class_id INT, 
    instructor_id INT, 
    member_name VARCHAR(255), 
    rating INT NOT NULL, 
    comment TEXT,
    FOREIGN KEY (class_id) REFERENCES Classes(class_id),
    FOREIGN KEY (instructor_id) REFERENCES Instructors(instructor_id)
);

INSERT INTO Classes (title, description) VALUES 
('Yoga', 'Relaxing and meditative class'),
('Zumba', 'High-energy dance workout'),
('Spin', 'Indoor cycling for cardio'),
('Bootcamp', 'Intense full-body workout'),
('Pilates', 'Focus on core strength and flexibility');

INSERT INTO Instructors (name) VALUES 
('Michelle Smith'),
('John Johnson'),
('Amy Adams'),
('Chris Davis'),
('Emily White');

INSERT INTO Reviews (class_id, instructor_id, member_name, rating, comment) VALUES 
(1, 1, 'Alice Johnson', 4, 'Really enjoyed the yoga class and Michelle is a great instructor'),
(2, 2, 'Bob Brown', 5, 'Zumba was so much fun, John is fantastic'),
(3, 3, 'Cathy Green', 3, 'Spin class was good but the music could be better'),
(4, 4, 'David Black', 5, 'Bootcamp was tough but Chris kept us motivated'),
(5, 5, 'Eva White', 4, 'Pilates class was relaxing and Emily is very knowledgeable');
