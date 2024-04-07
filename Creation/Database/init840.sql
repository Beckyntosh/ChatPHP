CREATE TABLE polls (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    poll_question VARCHAR(255) NOT NULL,
    poll_option_a VARCHAR(255) NOT NULL,
    poll_option_b VARCHAR(255) NOT NULL
);

INSERT INTO polls (poll_question, poll_option_a, poll_option_b) VALUES 
('Sample Question 1', 'Option A1', 'Option B1'),
('Sample Question 2', 'Option A2', 'Option B2'),
('Sample Question 3', 'Option A3', 'Option B3'),
('Sample Question 4', 'Option A4', 'Option B4'),
('Sample Question 5', 'Option A5', 'Option B5'),
('Sample Question 6', 'Option A6', 'Option B6'),
('Sample Question 7', 'Option A7', 'Option B7'),
('Sample Question 8', 'Option A8', 'Option B8'),
('Sample Question 9', 'Option A9', 'Option B9'),
('Sample Question 10', 'Option A10', 'Option B10');
