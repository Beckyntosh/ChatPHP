CREATE TABLE IF NOT EXISTS service_feedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    service_type VARCHAR(50) NOT NULL,
    rating INT(1) NOT NULL,
    comments TEXT,
    reg_date TIMESTAMP
);

INSERT INTO service_feedback (service_type, rating, comments) VALUES ('Cleaning', 4, 'Great service provided');
INSERT INTO service_feedback (service_type, rating, comments) VALUES ('Consultation', 5, 'Extremely helpful and knowledgeable');
INSERT INTO service_feedback (service_type, rating, comments) VALUES ('Repair', 3, 'Satisfactory job done');
INSERT INTO service_feedback (service_type, rating, comments) VALUES ('Delivery', 2, 'Delayed delivery, but good product');
INSERT INTO service_feedback (service_type, rating, comments) VALUES ('Installation', 4, 'Quick and efficient installation service');
INSERT INTO service_feedback (service_type, rating, comments) VALUES ('Training', 5, 'Excellent training session');
INSERT INTO service_feedback (service_type, rating, comments) VALUES ('Maintenance', 4, 'Regular maintenance visit was helpful');
INSERT INTO service_feedback (service_type, rating, comments) VALUES ('Support', 3, 'Average customer support experience');
INSERT INTO service_feedback (service_type, rating, comments) VALUES ('Consultation', 4, 'Good recommendations provided');
INSERT INTO service_feedback (service_type, rating, comments) VALUES ('Cleaning', 5, 'Spotless clean, highly recommend');
