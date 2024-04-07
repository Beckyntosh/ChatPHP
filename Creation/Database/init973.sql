CREATE TABLE IF NOT EXISTS books (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(100) NOT NULL,
  author VARCHAR(100) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  book_id INT(6) UNSIGNED NOT NULL,
  rating INT(2),
  review_text TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (book_id) REFERENCES books(id)
);

INSERT INTO books (title, author) VALUES ('Book 1', 'Author A');
INSERT INTO books (title, author) VALUES ('Book 2', 'Author B');
INSERT INTO books (title, author) VALUES ('Book 3', 'Author C');
INSERT INTO books (title, author) VALUES ('Book 4', 'Author D');
INSERT INTO books (title, author) VALUES ('Book 5', 'Author E');
INSERT INTO books (title, author) VALUES ('Book 6', 'Author F');
INSERT INTO books (title, author) VALUES ('Book 7', 'Author G');
INSERT INTO books (title, author) VALUES ('Book 8', 'Author H');
INSERT INTO books (title, author) VALUES ('Book 9', 'Author I');
INSERT INTO books (title, author) VALUES ('Book 10', 'Author J');
