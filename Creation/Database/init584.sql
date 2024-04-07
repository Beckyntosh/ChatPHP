CREATE TABLE products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    author VARCHAR(30) NOT NULL
);

INSERT INTO products (name, author) VALUES ('The Secret Garden', 'Frances Hodgson Burnett');
INSERT INTO products (name, author) VALUES ('Alice in Wonderland', 'Lewis Carroll');
INSERT INTO products (name, author) VALUES ('Pride and Prejudice', 'Jane Austen');
INSERT INTO products (name, author) VALUES ('The Great Gatsby', 'F. Scott Fitzgerald');
INSERT INTO products (name, author) VALUES ('To Kill a Mockingbird', 'Harper Lee');
INSERT INTO products (name, author) VALUES ('1984', 'George Orwell');
INSERT INTO products (name, author) VALUES ('The Catcher in the Rye', 'J.D. Salinger');
INSERT INTO products (name, author) VALUES ('Moby Dick', 'Herman Melville');
INSERT INTO products (name, author) VALUES ('War and Peace', 'Leo Tolstoy');
INSERT INTO products (name, author) VALUES ('Gone with the Wind', 'Margaret Mitchell');
