CREATE TABLE IF NOT EXISTS hotel_reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  guest_name VARCHAR(50) NOT NULL,
  review_text TEXT NOT NULL,
  rating INT(1) NOT NULL,
  review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO hotel_reviews (guest_name, review_text, rating) VALUES ('John Doe', 'Great hotel, enjoyed my stay!', 5);
INSERT INTO hotel_reviews (guest_name, review_text, rating) VALUES ('Jane Smith', 'Average experience, could be better.', 3);
INSERT INTO hotel_reviews (guest_name, review_text, rating) VALUES ('Michael Johnson', 'Fantastic service and amenities.', 5);
INSERT INTO hotel_reviews (guest_name, review_text, rating) VALUES ('Sarah Wilson', 'Clean rooms and friendly staff.', 4);
INSERT INTO hotel_reviews (guest_name, review_text, rating) VALUES ('Chris Brown', 'Disappointing stay, room was not clean.', 2);
INSERT INTO hotel_reviews (guest_name, review_text, rating) VALUES ('Emily Davis', 'Impressed with the hotels decor.', 4);
INSERT INTO hotel_reviews (guest_name, review_text, rating) VALUES ('Kevin Lee', 'Good value for money.', 4);
INSERT INTO hotel_reviews (guest_name, review_text, rating) VALUES ('Amanda Clark', 'Loved the location and views.', 5);
INSERT INTO hotel_reviews (guest_name, review_text, rating) VALUES ('Robert Taylor', 'Unpleasant experience, would not recommend.', 1);
INSERT INTO hotel_reviews (guest_name, review_text, rating) VALUES ('Laura Martinez', 'Comfortable beds and quiet environment.', 5);
