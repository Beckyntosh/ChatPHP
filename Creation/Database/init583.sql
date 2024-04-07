CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO comments (user_id, product_id, comment) VALUES
(1, 1, 'Great tablet for e-learning!'),
(2, 3, 'Really helpful in online tutoring sessions.'),
(3, 2, 'Battery life could be better.'),
(4, 4, 'Excellent for taking notes in class.'),
(5, 1, 'Fast and responsive performance.'),
(6, 3, 'Great for multimedia consumption.'),
(7, 2, 'Sleek design and lightweight.'),
(8, 4, 'Perfect for online meetings.'),
(9, 2, 'Good value for money.'),
(10, 1, 'Highly recommended for students.');
