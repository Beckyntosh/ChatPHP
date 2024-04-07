CREATE TABLE IF NOT EXISTS hotel_reviews (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        guest_name VARCHAR(30) NOT NULL,
        review TEXT NOT NULL,
        rating INT(6) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('John Doe', 'Great hotel, amazing service!', 5);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Jane Smith', 'Average experience, nothing special', 3);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Mike Johnson', 'Unacceptable service, would not recommend', 1);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Sarah Lee', 'Excellent stay, would definitely come back', 5);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Tom Brown', 'Good value for money, enjoyed the stay', 4);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Emily Wilson', 'Clean rooms, friendly staff', 4);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Alex White', 'Needs improvement in cleanliness', 2);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Olivia Davis', 'Lovely experience overall', 5);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Chris Martinez', 'Decent hotel, would recommend for short stays', 3);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Ella Rodriguez', 'Beautiful hotel, exceeded expectations', 5);
