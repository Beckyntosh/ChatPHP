CREATE TABLE IF NOT EXISTS testimonials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    testimonial TEXT
);

INSERT INTO testimonials(user_id, product_id, testimonial) VALUES (1, 101, 'This product is amazing!');
INSERT INTO testimonials(user_id, product_id, testimonial) VALUES (2, 102, 'Great experience with this product.');
INSERT INTO testimonials(user_id, product_id, testimonial) VALUES (3, 103, 'Highly recommend this product.');
INSERT INTO testimonials(user_id, product_id, testimonial) VALUES (4, 104, 'Best purchase ever!');
INSERT INTO testimonials(user_id, product_id, testimonial) VALUES (5, 105, 'Changed my life.');
INSERT INTO testimonials(user_id, product_id, testimonial) VALUES (6, 106, 'Worth every penny.');
INSERT INTO testimonials(user_id, product_id, testimonial) VALUES (7, 107, 'Will buy again.');
INSERT INTO testimonials(user_id, product_id, testimonial) VALUES (8, 108, 'Impressed with the quality.');
INSERT INTO testimonials(user_id, product_id, testimonial) VALUES (9, 109, 'Couldnt be happier.');
INSERT INTO testimonials(user_id, product_id, testimonial) VALUES (10, 110, 'Must-have product.');