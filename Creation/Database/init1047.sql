CREATE TABLE IF NOT EXISTS book_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    review TEXT NOT NULL,
    rating INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO book_reviews (book_title, author, review, rating) VALUES ('The Road', 'Cormac McCarthy', 'A gripping post-apocalyptic novel.', 5);
INSERT INTO book_reviews (book_title, author, review, rating) VALUES ('Station Eleven', 'Emily St. John Mandel', 'Beautifully written and haunting.', 4);
INSERT INTO book_reviews (book_title, author, review, rating) VALUES ('Oryx and Crake', 'Margaret Atwood', 'An intriguing dystopian tale.', 4);
INSERT INTO book_reviews (book_title, author, review, rating) VALUES ('Alas, Babylon', 'Pat Frank', 'Classic post-apocalyptic fiction.', 5);
INSERT INTO book_reviews (book_title, author, review, rating) VALUES ('The Stand', 'Stephen King', 'A masterful work of post-apocalyptic horror.', 5);
INSERT INTO book_reviews (book_title, author, review, rating) VALUES ('Wool', 'Hugh Howey', 'An addictive read in a bleak setting.', 4);
INSERT INTO book_reviews (book_title, author, review, rating) VALUES ('The Dog Stars', 'Peter Heller', 'A beautifully written novel of survival.', 4);
INSERT INTO book_reviews (book_title, author, review, rating) VALUES ('The Passage', 'Justin Cronin', 'Epic in scope and chilling.', 5);
INSERT INTO book_reviews (book_title, author, review, rating) VALUES ('The Girl With All the Gifts', 'M.R. Carey', 'A fresh take on the post-apocalyptic genre.', 4);
INSERT INTO book_reviews (book_title, author, review, rating) VALUES ('The Road', 'Cormac McCarthy', 'A bleak but powerful narrative.', 5);
