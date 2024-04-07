CREATE TABLE IF NOT EXISTS service_feedback (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  service_rating INT(1) NOT NULL,
  service_feedback VARCHAR(255) NOT NULL,
  submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO service_feedback (service_rating, service_feedback) VALUES (5, 'Great service, very thorough cleaning job.');
INSERT INTO service_feedback (service_rating, service_feedback) VALUES (4, 'Good service, few minor issues.');
INSERT INTO service_feedback (service_rating, service_feedback) VALUES (3, 'Average service, could be better.');
INSERT INTO service_feedback (service_rating, service_feedback) VALUES (2, 'Poor service, not satisfied with the results.');
INSERT INTO service_feedback (service_rating, service_feedback) VALUES (1, 'Terrible service, never hiring again.');
INSERT INTO service_feedback (service_rating, service_feedback) VALUES (4, 'Impressed with the professionalism of the cleaning staff.');
INSERT INTO service_feedback (service_rating, service_feedback) VALUES (3, 'Service was okay, nothing special.');
INSERT INTO service_feedback (service_rating, service_feedback) VALUES (5, 'Excellent service, exceeded my expectations.');
INSERT INTO service_feedback (service_rating, service_feedback) VALUES (2, 'Disappointed with the lack of attention to detail.');
INSERT INTO service_feedback (service_rating, service_feedback) VALUES (4, 'Satisfied overall with the service provided.');
