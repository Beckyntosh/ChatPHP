CREATE TABLE IF NOT EXISTS hotel_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    guest_name VARCHAR(30) NOT NULL,
    review TEXT NOT NULL,
    rating INT(1) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('John Doe', 'Great experience, highly recommend!', 5);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Alice Smith', 'Average stay, room was clean.', 3);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Mike Johnson', 'Not satisfied with service.', 2);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Sarah Davis', 'Excellent amenities and staff.', 5);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Emily Brown', 'Fantastic view from the room.', 4);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Chris Wilson', 'Disappointing experience, room was dirty.', 1);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Jessica Lee', 'Lovely stay, will visit again.', 5);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Sam Roberts', 'Good value for money.', 4);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Linda Miller', 'Room service was slow.', 3);
INSERT INTO hotel_reviews (guest_name, review, rating) VALUES ('Mark Taylor', 'Overall pleasant stay.', 4);
