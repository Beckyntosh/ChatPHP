CREATE TABLE IF NOT EXISTS comments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  article_id INT NOT NULL,
  author VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  posted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO comments (article_id, author, content) VALUES (1, 'John Doe', 'Great article!');
INSERT INTO comments (article_id, author, content) VALUES (1, 'Alice Smith', 'Interesting topic.');
INSERT INTO comments (article_id, author, content) VALUES (2, 'Bob Brown', 'I disagree with the main points.');
INSERT INTO comments (article_id, author, content) VALUES (2, 'Emma Johnson', 'Well written, informative.');
INSERT INTO comments (article_id, author, content) VALUES (3, 'Sarah Wilson', 'I have a different perspective.');
INSERT INTO comments (article_id, author, content) VALUES (3, 'Mike Davis', 'Looking forward to more articles.');
INSERT INTO comments (article_id, author, content) VALUES (4, 'Laura White', 'This article changed my view.');
INSERT INTO comments (article_id, author, content) VALUES (4, 'Chris Lee', 'I can relate to this topic.');
INSERT INTO comments (article_id, author, content) VALUES (5, 'Emily Adams', 'I found this very helpful.');
INSERT INTO comments (article_id, author, content) VALUES (5, 'Alex Kim', 'Cant wait for the next one.');
