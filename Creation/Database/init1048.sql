CREATE TABLE IF NOT EXISTS books (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255),
    publish_year INT(4),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    book_id INT(6) UNSIGNED,
    user VARCHAR(255) NOT NULL,
    rating INT(1),
    review TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (book_id) REFERENCES books(id)
);

INSERT INTO books (title, author, publish_year) VALUES ('The Great Gatsby', 'F. Scott Fitzgerald', 1925);
INSERT INTO books (title, author, publish_year) VALUES ('To Kill a Mockingbird', 'Harper Lee', 1960);
INSERT INTO books (title, author, publish_year) VALUES ('1984', 'George Orwell', 1949);
INSERT INTO books (title, author, publish_year) VALUES ('Pride and Prejudice', 'Jane Austen', 1813);
INSERT INTO books (title, author, publish_year) VALUES ('Harry Potter and the Sorcerer\'s Stone', 'J.K. Rowling', 1997);
INSERT INTO books (title, author, publish_year) VALUES ('The Catcher in the Rye', 'J.D. Salinger', 1951);
INSERT INTO books (title, author, publish_year) VALUES ('The Hobbit', 'J.R.R. Tolkien', 1937);
INSERT INTO books (title, author, publish_year) VALUES ('The Da Vinci Code', 'Dan Brown', 2003);
INSERT INTO books (title, author, publish_year) VALUES ('The Alchemist', 'Paulo Coelho', 1988);
INSERT INTO books (title, author, publish_year) VALUES ('Gone with the Wind', 'Margaret Mitchell', 1936);