CREATE TABLE IF NOT EXISTS wishlists (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userEmail VARCHAR(50) NOT NULL,
    bookId INT(11) NOT NULL,
    dateAdded TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO wishlists (userEmail, bookId) VALUES ('test1@example.com', 123);
INSERT INTO wishlists (userEmail, bookId) VALUES ('test2@example.com', 456);
INSERT INTO wishlists (userEmail, bookId) VALUES ('test3@example.com', 789);
INSERT INTO wishlists (userEmail, bookId) VALUES ('test4@example.com', 321);
INSERT INTO wishlists (userEmail, bookId) VALUES ('test5@example.com', 654);
INSERT INTO wishlists (userEmail, bookId) VALUES ('test6@example.com', 987);
INSERT INTO wishlists (userEmail, bookId) VALUES ('test7@example.com', 741);
INSERT INTO wishlists (userEmail, bookId) VALUES ('test8@example.com', 852);
INSERT INTO wishlists (userEmail, bookId) VALUES ('test9@example.com', 147);
INSERT INTO wishlists (userEmail, bookId) VALUES ('test10@example.com', 258);
