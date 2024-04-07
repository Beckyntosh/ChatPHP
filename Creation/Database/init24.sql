CREATE TABLE IF NOT EXISTS books (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    genre VARCHAR(100) NOT NULL,
    user_rating FLOAT(3,2) DEFAULT 0.0,
    popularity INT(10) DEFAULT 0,
    reg_date TIMESTAMP
);

INSERT INTO books (title, author, genre, user_rating, popularity, reg_date) VALUES ('Harry Potter and the Sorcerer\'s Stone', 'J.K. Rowling', 'Fantasy', 4.5, 100, NOW());
INSERT INTO books (title, author, genre, user_rating, popularity, reg_date) VALUES ('1984', 'George Orwell', 'Sci-Fi', 4.2, 80, NOW());
INSERT INTO books (title, author, genre, user_rating, popularity, reg_date) VALUES ('Pride and Prejudice', 'Jane Austen', 'Romance', 4.0, 70, NOW());
INSERT INTO books (title, author, genre, user_rating, popularity, reg_date) VALUES ('The Shining', 'Stephen King', 'Horror', 4.7, 120, NOW());
INSERT INTO books (title, author, genre, user_rating, popularity, reg_date) VALUES ('The Great Gatsby', 'F. Scott Fitzgerald', 'Romance', 4.3, 90, NOW());
INSERT INTO books (title, author, genre, user_rating, popularity, reg_date) VALUES ('Dune', 'Frank Herbert', 'Sci-Fi', 4.6, 110, NOW());
INSERT INTO books (title, author, genre, user_rating, popularity, reg_date) VALUES ('Dracula', 'Bram Stoker', 'Horror', 4.8, 130, NOW());
INSERT INTO books (title, author, genre, user_rating, popularity, reg_date) VALUES ('The Hobbit', 'J.R.R. Tolkien', 'Fantasy', 4.4, 95, NOW());
INSERT INTO books (title, author, genre, user_rating, popularity, reg_date) VALUES ('To Kill a Mockingbird', 'Harper Lee', 'Drama', 4.1, 75, NOW());
INSERT INTO books (title, author, genre, user_rating, popularity, reg_date) VALUES ('The Lord of the Rings', 'J.R.R. Tolkien', 'Fantasy', 4.9, 140, NOW());