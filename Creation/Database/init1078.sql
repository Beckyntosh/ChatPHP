CREATE TABLE IF NOT EXISTS album_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    album_name VARCHAR(255) NOT NULL,
    reviewer_name VARCHAR(255) NOT NULL,
    review TEXT NOT NULL,
    rating INT(1) NOT NULL,
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO album_reviews (album_name, reviewer_name, review, rating) VALUES ('Album1', 'Reviewer1', 'Great album, loved the vocals!', '5');
INSERT INTO album_reviews (album_name, reviewer_name, review, rating) VALUES ('Album2', 'Reviewer2', 'Solid production and catchy tunes.', '4');
INSERT INTO album_reviews (album_name, reviewer_name, review, rating) VALUES ('Album3', 'Reviewer3', 'Not my cup of tea, but well made.', '3');
INSERT INTO album_reviews (album_name, reviewer_name, review, rating) VALUES ('Album4', 'Reviewer4', 'Incredible instrumental work!', '5');
INSERT INTO album_reviews (album_name, reviewer_name, review, rating) VALUES ('Album5', 'Reviewer5', 'Average album, nothing special.', '2');
INSERT INTO album_reviews (album_name, reviewer_name, review, rating) VALUES ('Album6', 'Reviewer6', 'Mind-blowing lyrics and depth.', '5');
INSERT INTO album_reviews (album_name, reviewer_name, review, rating) VALUES ('Album7', 'Reviewer7', 'Meh, didnt enjoy it much.', '2');
INSERT INTO album_reviews (album_name, reviewer_name, review, rating) VALUES ('Album8', 'Reviewer8', 'Best album of the year!', '5');
INSERT INTO album_reviews (album_name, reviewer_name, review, rating) VALUES ('Album9', 'Reviewer9', 'Decent effort but could be better.', '3');
INSERT INTO album_reviews (album_name, reviewer_name, review, rating) VALUES ('Album10', 'Reviewer10', 'Enjoyed every track, a masterpiece.', '5');
