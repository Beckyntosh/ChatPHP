CREATE TABLE IF NOT EXISTS service_feedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    service_type VARCHAR(50) NOT NULL,
    client_name VARCHAR(50),
    rating INT(1),
    feedback TEXT,
    reg_date TIMESTAMP
);

INSERT INTO service_feedback (service_type, client_name, rating, feedback) VALUES ('Home Cleaning', 'John Doe', '4', 'Great service, very professional.');
INSERT INTO service_feedback (service_type, client_name, rating, feedback) VALUES ('Professional Consultation', 'Jane Smith', '5', 'Highly recommended, solved my problem efficiently.');
INSERT INTO service_feedback (service_type, client_name, rating, feedback) VALUES ('Home Cleaning', 'Alice Johnson', '3', 'Decent service, could improve on attention to detail.');
INSERT INTO service_feedback (service_type, client_name, rating, feedback) VALUES ('Professional Consultation', 'Michael Brown', '4', 'Good advice and expertise.');
INSERT INTO service_feedback (service_type, client_name, rating, feedback) VALUES ('Home Cleaning', 'Sarah Lee', '5', 'Excellent job, very satisfied.');
INSERT INTO service_feedback (service_type, client_name, rating, feedback) VALUES ('Professional Consultation', 'David Wilson', '2', 'Did not meet expectations.');
INSERT INTO service_feedback (service_type, client_name, rating, feedback) VALUES ('Home Cleaning', 'Emily Taylor', '4', 'Overall good service, would use again.');
INSERT INTO service_feedback (service_type, client_name, rating, feedback) VALUES ('Professional Consultation', 'Daniel Anderson', '5', 'Extremely helpful and knowledgeable.');
INSERT INTO service_feedback (service_type, client_name, rating, feedback) VALUES ('Home Cleaning', 'Olivia Martinez', '3', 'Some areas missed, but overall decent.');
INSERT INTO service_feedback (service_type, client_name, rating, feedback) VALUES ('Professional Consultation', 'William Garcia', '4', 'Resolved my issue effectively.');
