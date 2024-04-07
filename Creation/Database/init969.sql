CREATE TABLE IF NOT EXISTS service_feedback (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  service_name VARCHAR(255) NOT NULL,
  user_name VARCHAR(255),
  rating INT(1),
  review TEXT,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO service_feedback (service_name, user_name, rating, review) VALUES
('Cleaning Service', 'Alice', 4, 'Great service, very thorough cleaning job.'),
('Consultation Service', 'Bob', 5, 'Professional and knowledgeable consultant.'),
('Gaming Service', 'Charlie', 4, 'Enjoyed the game, great graphics.'),
('Repair Service', 'David', 3, 'Service was good but took longer than expected.'),
('Delivery Service', 'Eve', 5, 'Prompt and reliable delivery.'),
('Training Service', 'Frank', 4, 'Instructor was engaging and helpful.'),
('IT Service', 'Grace', 5, 'Resolved my tech issues quickly.'),
('Event Service', 'Hannah', 4, 'Well organized and enjoyable event.'),
('Support Service', 'Ivy', 3, 'Average support received.'),
('Maintenance Service', 'Jack', 2, 'Disappointing experience, work was not completed satisfactorily.');
