CREATE TABLE IF NOT EXISTS service_feedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    service_name VARCHAR(50) NOT NULL,
    user_email VARCHAR(50),
    rating INT(1),
    comments TEXT,
    reg_date TIMESTAMP
);

INSERT INTO service_feedback (service_name, user_email, rating, comments) VALUES ('Home Cleaning Company', 'user1@example.com', 4, 'Great service, very thorough cleaning');
INSERT INTO service_feedback (service_name, user_email, rating, comments) VALUES ('Home Cleaning Company', 'user2@example.com', 5, 'Excellent service, very professional');
INSERT INTO service_feedback (service_name, user_email, rating, comments) VALUES ('Home Cleaning Company', 'user3@example.com', 3, 'Good service, arrived on time');
INSERT INTO service_feedback (service_name, user_email, rating, comments) VALUES ('Home Cleaning Company', 'user4@example.com', 2, 'Disappointing service, missed some areas');
INSERT INTO service_feedback (service_name, user_email, rating, comments) VALUES ('Home Cleaning Company', 'user5@example.com', 4, 'Overall satisfied with the service');
INSERT INTO service_feedback (service_name, user_email, rating, comments) VALUES ('Home Cleaning Company', 'user6@example.com', 5, 'Highly recommend, exceeded expectations');
INSERT INTO service_feedback (service_name, user_email, rating, comments) VALUES ('Home Cleaning Company', 'user7@example.com', 3, 'Average service, nothing special');
INSERT INTO service_feedback (service_name, user_email, rating, comments) VALUES ('Home Cleaning Company', 'user8@example.com', 4, 'Reasonable pricing, good value for money');
INSERT INTO service_feedback (service_name, user_email, rating, comments) VALUES ('Home Cleaning Company', 'user9@example.com', 2, 'Poor communication, did not respond to queries');
INSERT INTO service_feedback (service_name, user_email, rating, comments) VALUES ('Home Cleaning Company', 'user10@example.com', 4, 'Prompt service, quick response time');