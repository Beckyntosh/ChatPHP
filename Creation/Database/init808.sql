CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    comment TEXT NOT NULL
);

INSERT INTO users (username, comment) VALUES ('Alice', 'Great forum!'),
('Bob', 'Interesting discussions'),
('Eve', 'Learning a lot from here'),
('John', 'Excited to be part of this community'),
('Sarah', 'Love the space theme of the forum'),
('Mike', 'Thank you for the helpful resources'),
('Jenny', 'Looking forward to more posts'),
('David', 'This is a cool platform'),
('Emily', 'Helpful insights shared here'),
('Tom', 'Joined recently and already enjoying it');
