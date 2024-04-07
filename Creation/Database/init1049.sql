CREATE TABLE IF NOT EXISTS books (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
author VARCHAR(255),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
book_id INT(6) UNSIGNED,
review_text TEXT,
rating INT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
FOREIGN KEY (book_id) REFERENCES books(id)
);

INSERT INTO books (title, author) VALUES ('Book1', 'Author1');
INSERT INTO books (title, author) VALUES ('Book2', 'Author2');
INSERT INTO books (title, author) VALUES ('Book3', 'Author3');
INSERT INTO books (title, author) VALUES ('Book4', 'Author4');
INSERT INTO books (title, author) VALUES ('Book5', 'Author5');
INSERT INTO books (title, author) VALUES ('Book6', 'Author6');
INSERT INTO books (title, author) VALUES ('Book7', 'Author7');
INSERT INTO books (title, author) VALUES ('Book8', 'Author8');
INSERT INTO books (title, author) VALUES ('Book9', 'Author9');
INSERT INTO books (title, author) VALUES ('Book10', 'Author10');