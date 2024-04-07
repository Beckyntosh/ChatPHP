CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_id INT,
    user VARCHAR(255),
    rating INT,
    review TEXT,
    FOREIGN KEY (book_id) REFERENCES books(id)
);

INSERT INTO books (title, author) VALUES 
('Book 1 Title', 'Author 1'),
('Book 2 Title', 'Author 2'),
('Book 3 Title', 'Author 3'),
('Book 4 Title', 'Author 4'),
('Book 5 Title', 'Author 5'),
('Book 6 Title', 'Author 6'),
('Book 7 Title', 'Author 7'),
('Book 8 Title', 'Author 8'),
('Book 9 Title', 'Author 9'),
('Book 10 Title', 'Author 10');
