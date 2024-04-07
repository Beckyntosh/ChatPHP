CREATE TABLE IF NOT EXISTS comments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    article_id INT(6) UNSIGNED,
    author_name VARCHAR(30) NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    content TEXT NOT NULL
);

-- Insert 10 values into comments table
INSERT INTO comments (article_id, author_name, content) VALUES (1, 'John Doe', 'Great article!'),
(1, 'Jane Smith', 'Interesting perspective.'),
(2, 'Alice Johnson', 'I completely disagree with the author.'),
(2, 'Bob Brown', 'Good points made in the article.'),
(3, 'Sarah White', 'This topic needs more attention.'),
(3, 'Michael Lee', 'I agree with the author\'s points.'),
(4, 'Emily Davis', 'Looking forward to more articles like this.'),
(4, 'Peter Harris', 'Well-written article.'),
(5, 'Olivia Clark', 'The author missed some key points.'),
(5, 'David Martinez', 'I enjoyed reading this article.');

