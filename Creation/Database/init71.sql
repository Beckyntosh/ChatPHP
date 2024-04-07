CREATE TABLE IF NOT EXISTS posts (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  title VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  tags VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO posts (title, content, tags) VALUES ('Post 1 Title', 'Post 1 Content', 'tag1, tag2');
INSERT INTO posts (title, content, tags) VALUES ('Post 2 Title', 'Post 2 Content', 'tag2, tag3');
INSERT INTO posts (title, content, tags) VALUES ('Post 3 Title', 'Post 3 Content', 'tag1, tag3');
INSERT INTO posts (title, content, tags) VALUES ('Post 4 Title', 'Post 4 Content', 'tag1, tag2, tag3');
INSERT INTO posts (title, content, tags) VALUES ('Post 5 Title', 'Post 5 Content', 'tag2, tag3');
INSERT INTO posts (title, content, tags) VALUES ('Post 6 Title', 'Post 6 Content', 'tag1');
INSERT INTO posts (title, content, tags) VALUES ('Post 7 Title', 'Post 7 Content', 'tag3');
INSERT INTO posts (title, content, tags) VALUES ('Post 8 Title', 'Post 8 Content', 'tag1, tag2');
INSERT INTO posts (title, content, tags) VALUES ('Post 9 Title', 'Post 9 Content', 'tag1, tag3');
INSERT INTO posts (title, content, tags) VALUES ('Post 10 Title', 'Post 10 Content', 'tag2');
