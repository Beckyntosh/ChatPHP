CREATE TABLE IF NOT EXISTS service_feedback (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  service_rating INT(1) NOT NULL,
  comment TEXT,
  submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO service_feedback (service_rating, comment) VALUES (5, 'Excellent service');
INSERT INTO service_feedback (service_rating, comment) VALUES (3, 'Average service');
INSERT INTO service_feedback (service_rating, comment) VALUES (4, 'Good service');
INSERT INTO service_feedback (service_rating, comment) VALUES (2, 'Below average service');
INSERT INTO service_feedback (service_rating, comment) VALUES (5, 'Outstanding service');
INSERT INTO service_feedback (service_rating, comment) VALUES (1, 'Terrible service');
INSERT INTO service_feedback (service_rating, comment) VALUES (5, 'Highly recommended service');
INSERT INTO service_feedback (service_rating, comment) VALUES (4, 'Satisfactory service');
INSERT INTO service_feedback (service_rating, comment) VALUES (3, 'Needs improvement');
INSERT INTO service_feedback (service_rating, comment) VALUES (5, 'Best service ever');
