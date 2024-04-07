CREATE TABLE IF NOT EXISTS app_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    review TEXT NOT NULL,
    rating INT(1),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO app_reviews (username, review, rating) VALUES ('John Doe', 'Great app, very useful.', 4);
INSERT INTO app_reviews (username, review, rating) VALUES ('Jane Smith', 'Easy to use and efficient.', 5);
INSERT INTO app_reviews (username, review, rating) VALUES ('Michael Johnson', 'Could be better, needs more features.', 3);
INSERT INTO app_reviews (username, review, rating) VALUES ('Sarah Williams', 'User-friendly interface.', 5);
INSERT INTO app_reviews (username, review, rating) VALUES ('Robert Brown', 'Works well on all devices.', 4);
INSERT INTO app_reviews (username, review, rating) VALUES ('Laura Lee', 'Helpful customer support.', 4);
INSERT INTO app_reviews (username, review, rating) VALUES ('William Davis', 'Improved my productivity.', 5);
INSERT INTO app_reviews (username, review, rating) VALUES ('Emily Martinez', 'Some bugs need fixing.', 2);
INSERT INTO app_reviews (username, review, rating) VALUES ('Daniel Taylor', 'Good value for money.', 4);
INSERT INTO app_reviews (username, review, rating) VALUES ('Olivia Anderson', 'Highly recommend this app.', 5);
