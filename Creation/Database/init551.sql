CREATE TABLE IF NOT EXISTS posts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  content TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO posts (title, content) VALUES ('Post 1 Title', 'Post 1 Content');
INSERT INTO posts (title, content) VALUES ('Post 2 Title', 'Post 2 Content');
INSERT INTO posts (title, content) VALUES ('Post 3 Title', 'Post 3 Content');
INSERT INTO posts (title, content) VALUES ('Post 4 Title', 'Post 4 Content');
INSERT INTO posts (title, content) VALUES ('Post 5 Title', 'Post 5 Content');
INSERT INTO posts (title, content) VALUES ('Post 6 Title', 'Post 6 Content');
INSERT INTO posts (title, content) VALUES ('Post 7 Title', 'Post 7 Content');
INSERT INTO posts (title, content) VALUES ('Post 8 Title', 'Post 8 Content');
INSERT INTO posts (title, content) VALUES ('Post 9 Title', 'Post 9 Content');
INSERT INTO posts (title, content) VALUES ('Post 10 Title', 'Post 10 Content');
