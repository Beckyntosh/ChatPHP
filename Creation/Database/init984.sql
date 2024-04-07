CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
rating INT(1) NOT NULL,
review TEXT NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO reviews (rating, review) VALUES (5, "Great selection of vinyl records, love the beginner-friendly approach.");
INSERT INTO reviews (rating, review) VALUES (4, "Good quality vinyl records, could use more variety.");
INSERT INTO reviews (rating, review) VALUES (3, "Average selection, but prices are fair.");
INSERT INTO reviews (rating, review) VALUES (5, "Amazing service, quick shipping.");
INSERT INTO reviews (rating, review) VALUES (2, "Disappointed with the condition of the records.");
INSERT INTO reviews (rating, review) VALUES (5, "Best place to shop for vinyl records!");
INSERT INTO reviews (rating, review) VALUES (3, "Decent selection, could improve on packaging.");
INSERT INTO reviews (rating, review) VALUES (4, "Happy with my purchase, will buy again.");
INSERT INTO reviews (rating, review) VALUES (5, "Impressed with the customer service.");
INSERT INTO reviews (rating, review) VALUES (1, "Worst experience, records arrived damaged.");
