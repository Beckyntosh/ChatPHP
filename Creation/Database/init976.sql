CREATE TABLE IF NOT EXISTS hotel_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    guest_name VARCHAR(50) NOT NULL,
    review TEXT NOT NULL,
    rating INT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Alice', 'Great experience, highly recommend this hotel!', 5);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Bob', 'Good stay, would come back again.', 4);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Charlie', 'Average experience, felt the room could be cleaner.', 3);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('David', 'Disappointed with the service, would not return.', 1);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Eve', 'Excellent stay, exceeded my expectations.', 5);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Frank', 'Decent hotel, but the breakfast could be improved.', 3);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Grace', 'Lovely hotel, great amenities.', 4);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Hannah', 'Average room, but fantastic location.', 3);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Ian', 'Outstanding service, would definitely visit again.', 5);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Jack', 'Overall pleasant experience, would recommend to friends.', 4);
