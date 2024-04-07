CREATE TABLE IF NOT EXISTS comments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    postId INT(6) UNSIGNED,
    content TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO comments (postId, content) VALUES (1, 'Great post, thanks for sharing!');
INSERT INTO comments (postId, content) VALUES (1, 'I have a question, can you elaborate on this topic?');
INSERT INTO comments (postId, content) VALUES (1, 'This is very informative, I learned a lot.');
INSERT INTO comments (postId, content) VALUES (2, 'Love the sunglasses, they look stylish!');
INSERT INTO comments (postId, content) VALUES (2, 'Where can I buy these sunglasses?');
INSERT INTO comments (postId, content) VALUES (2, 'Great choice of style, perfect for summer.');
INSERT INTO comments (postId, content) VALUES (3, 'The accuracy of this information is impressive!');
INSERT INTO comments (postId, content) VALUES (3, 'I didnt know sunglasses could be so accurate.');
INSERT INTO comments (postId, content) VALUES (3, 'Looking forward to more posts like this.');
INSERT INTO comments (postId, content) VALUES (3, 'Fantastic job on the research, very well done.');
