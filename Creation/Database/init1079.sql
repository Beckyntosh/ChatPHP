CREATE TABLE IF NOT EXISTS album_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    album_name VARCHAR(50) NOT NULL,
    reviewer_name VARCHAR(50),
    review_text VARCHAR(255),
    rating INT(1),
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO album_reviews (album_name, reviewer_name, review_text, rating) VALUES ('Album1', 'Reviewer1', 'Good album', 4);
INSERT INTO album_reviews (album_name, reviewer_name, review_text, rating) VALUES ('Album2', 'Reviewer2', 'Great album with amazing beats', 5);
INSERT INTO album_reviews (album_name, reviewer_name, review_text, rating) VALUES ('Album3', 'Reviewer3', 'Could be better', 3);
INSERT INTO album_reviews (album_name, reviewer_name, review_text, rating) VALUES ('Album4', 'Reviewer4', 'Interesting mix of songs', 4);
INSERT INTO album_reviews (album_name, reviewer_name, review_text, rating) VALUES ('Album5', 'Reviewer5', 'Loved it, would recommend', 5);
INSERT INTO album_reviews (album_name, reviewer_name, review_text, rating) VALUES ('Album6', 'Reviewer6', 'Average album', 2);
INSERT INTO album_reviews (album_name, reviewer_name, review_text, rating) VALUES ('Album7', 'Reviewer7', 'Disappointed with this album', 1);
INSERT INTO album_reviews (album_name, reviewer_name, review_text, rating) VALUES ('Album8', 'Reviewer8', 'Classic album, timeless tunes', 5);
INSERT INTO album_reviews (album_name, reviewer_name, review_text, rating) VALUES ('Album9', 'Reviewer9', 'Not my cup of tea', 2);
INSERT INTO album_reviews (album_name, reviewer_name, review_text, rating) VALUES ('Album10', 'Reviewer10', 'Decent tracks, worth a listen', 3);