CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(255)
);

INSERT INTO users (name, email, password) VALUES ('Alice', 'alice@example.com', '$2y$10$saxyuEgxgwHgR13/gfNWpeO9ke/KCG0sEBy2eHqkSmNbfY8kwZLdC'),
('Bob', 'bob@example.com', '$2y$10$wKnq5mvbUg80s3qMsU95huwYCETczwF3kE7a8QSLtaNcpk/ErgC3u'),
('Charlie', 'charlie@example.com', '$2y$10$AA8.irwRVl6SqanuGKzJLunusS6rIiX8JukSWMcH8zlS1kYWhCtvq'),
('David', 'david@example.com', '$2y$10$iF96cX/Mt5r.Rp5tX/320ugm4ygC07M63LKA6bOrlUaOmpex9Ix4u'),
('Eve', 'eve@example.com', '$2y$10$f8Pbyc4999QHTod/HdTNP.6I6llLippTx9hsLrjFbYEF6Hza1.c66'),
('Frank', 'frank@example.com', '$2y$10$8mytHInlIqdgN.5HoaNLsOtQAXe0P2YRWFrkQ7y8n1p5Un9RGcwCy'),
('Grace', 'grace@example.com', '$2y$10$92XWpU85xFp5pG55FcEIQ.tVqmxqCBpz7oAZUv8hj6Umi7ampto9i'),
('Hannah', 'hannah@example.com', '$2y$10$AA0bVqbor7sJW7uq.7CbzOJT1NYcGz9fn28.BT6o9cwzz49J.6gVa'),
('Ivan', 'ivan@example.com', '$2y$10$Sjw11omU9N4eNRctXGaFWeGySWPfHaSIMCECPvN9jgEvCGbm/1avG'),
('Jenny', 'jenny@example.com', '$2y$10$V/O2%eKQd5t3Fr2ERTXkoe5yLKVuVl0JaYNAvrOCOgtgD/G10F2ui');
