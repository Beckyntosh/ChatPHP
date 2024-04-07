CREATE TABLE IF NOT EXISTS app_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    rating INT(1) NOT NULL,
    review TEXT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO app_reviews (username, rating, review) VALUES ('JohnDoe', 4, 'Great app, very user-friendly');
INSERT INTO app_reviews (username, rating, review) VALUES ('JaneSmith', 5, 'I love this app, its amazing!');
INSERT INTO app_reviews (username, rating, review) VALUES ('BobJohnson', 3, 'Could use some improvements');
INSERT INTO app_reviews (username, rating, review) VALUES ('AliceBrown', 2, 'Not very impressed with the app');
INSERT INTO app_reviews (username, rating, review) VALUES ('SamWilson', 5, 'Best app Ive ever used!');
INSERT INTO app_reviews (username, rating, review) VALUES ('EmilyDavis', 4, 'Solid app, would recommend');
INSERT INTO app_reviews (username, rating, review) VALUES ('ChrisLee', 1, 'Terrible app, waste of time');
INSERT INTO app_reviews (username, rating, review) VALUES ('SarahWhite', 5, 'Perfect app for my needs');
INSERT INTO app_reviews (username, rating, review) VALUES ('MikeBrown', 3, 'Decent app, but needs more features');
INSERT INTO app_reviews (username, rating, review) VALUES ('AmandaTaylor', 4, 'Good app overall, happy with it');
