CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
reviewer VARCHAR(30) NOT NULL,
employee VARCHAR(30) NOT NULL,
rating INT(1) NOT NULL,
feedback TEXT NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO reviews (reviewer, employee, rating, feedback) VALUES ('John Doe', 'Alice Smith', 5, 'Great teamwork and communication skills.');
INSERT INTO reviews (reviewer, employee, rating, feedback) VALUES ('Jane Smith', 'Bob Johnson', 4, 'Excellent problem-solving abilities.');
INSERT INTO reviews (reviewer, employee, rating, feedback) VALUES ('Michael Brown', 'Sarah Lee', 5, 'Consistently meets deadlines with high quality work.');
INSERT INTO reviews (reviewer, employee, rating, feedback) VALUES ('Emily Davis', 'Tom Wilson', 3, 'Needs to improve attention to detail.');
INSERT INTO reviews (reviewer, employee, rating, feedback) VALUES ('Chris Evans', 'Linda Rodriguez', 4, 'Strong leadership skills and motivates the team.');
INSERT INTO reviews (reviewer, employee, rating, feedback) VALUES ('Amy White', 'James Taylor', 4, 'Excellent customer service skills.');
INSERT INTO reviews (reviewer, employee, rating, feedback) VALUES ('Mark Thompson', 'Karen Garcia', 2, 'Struggles with time management.');
INSERT INTO reviews (reviewer, employee, rating, feedback) VALUES ('Jessica Harris', 'Brian Martinez', 3, 'Good team player but needs to speak up in meetings.');
INSERT INTO reviews (reviewer, employee, rating, feedback) VALUES ('Kevin Scott', 'Laura Adams', 5, 'Outstanding performance in all projects.');
INSERT INTO reviews (reviewer, employee, rating, feedback) VALUES ('Samantha Clark', 'Peter Cooper', 4, 'Resourceful and adaptable to changing circumstances.');
