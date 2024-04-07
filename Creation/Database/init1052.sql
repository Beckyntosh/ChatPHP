CREATE TABLE IF NOT EXISTS hotel_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    rating INT(1) NOT NULL,
    review TEXT,
    guest_name VARCHAR(50),
    visit_date DATE,
    reg_date TIMESTAMP
);

INSERT INTO hotel_reviews (rating, review, guest_name, visit_date) VALUES (5, 'Great hotel experience, would highly recommend', 'Alice Smith', '2022-01-15');
INSERT INTO hotel_reviews (rating, review, guest_name, visit_date) VALUES (4, 'Nice hotel with friendly staff', 'John Doe', '2022-02-28');
INSERT INTO hotel_reviews (rating, review, guest_name, visit_date) VALUES (3, 'Average stay, could use improvement', 'Emily Brown', '2022-03-10');
INSERT INTO hotel_reviews (rating, review, guest_name, visit_date) VALUES (5, 'Exceptional service and amenities', 'Michael Johnson', '2022-04-05');
INSERT INTO hotel_reviews (rating, review, guest_name, visit_date) VALUES (2, 'Disappointing experience, room was not clean', 'Sarah Wilson', '2022-05-20');
INSERT INTO hotel_reviews (rating, review, guest_name, visit_date) VALUES (1, 'Worst hotel stay ever, do not recommend', 'David Clark', '2022-06-12');
INSERT INTO hotel_reviews (rating, review, guest_name, visit_date) VALUES (4, 'Pleasant stay overall, could be improved', 'Jessica Lee', '2022-07-17');
INSERT INTO hotel_reviews (rating, review, guest_name, visit_date) VALUES (5, 'Fantastic hotel with beautiful views', 'Matthew Taylor', '2022-08-30');
INSERT INTO hotel_reviews (rating, review, guest_name, visit_date) VALUES (3, 'Mixed experience, some positives and negatives', 'Laura White', '2022-09-25');
INSERT INTO hotel_reviews (rating, review, guest_name, visit_date) VALUES (4, 'Comfortable stay, would consider coming back', 'Robert Anderson', '2022-10-10');
