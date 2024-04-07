CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userName VARCHAR(30) NOT NULL,
    rating INT(1) NOT NULL,
    review TEXT,
    submissionDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO reviews (userName, rating, review) VALUES ('John Doe', 4, 'Great app, highly recommended');
INSERT INTO reviews (userName, rating, review) VALUES ('Alice Smith', 5, 'Incredible features, love it!');
INSERT INTO reviews (userName, rating, review) VALUES ('Eva Johnson', 3, 'Good app but could use some improvements');
INSERT INTO reviews (userName, rating, review) VALUES ('Michael Brown', 2, 'Not very user-friendly');
INSERT INTO reviews (userName, rating, review) VALUES ('Sarah Lee', 4, 'Nice design and easy to use');
INSERT INTO reviews (userName, rating, review) VALUES ('David Wilson', 5, 'Best makeup app out there!');
INSERT INTO reviews (userName, rating, review) VALUES ('Emma Taylor', 3, 'Decent app, could be better');
INSERT INTO reviews (userName, rating, review) VALUES ('Ryan Anderson', 1, 'Terrible experience, do not recommend');
INSERT INTO reviews (userName, rating, review) VALUES ('Olivia Williams', 4, 'Satisfied with the app features');
INSERT INTO reviews (userName, rating, review) VALUES ('Nathan Martinez', 2, 'Needs more variety in products');
