CREATE TABLE IF NOT EXISTS service_feedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    service_name VARCHAR(50) NOT NULL,
    user_name VARCHAR(50),
    rating INT(1),
    comments TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO service_feedback (service_name, user_name, rating, comments) VALUES 
('House Cleaning', 'John Doe', 4, 'Great service, very thorough cleaning'),
('Gardening Service', 'Jane Smith', 5, 'The garden looks amazing after their work'),
('Car Wash', 'David Johnson', 3, 'Decent job, could improve on the interior cleaning'),
('Landscaping', 'Emily Davis', 5, 'Absolutely stunning design, exceeded expectations'),
('Swimming Pool Maintenance', 'Michael Wilson', 4, 'Reliable and efficient service'),
('Window Cleaning', 'Sarah Brown', 3, 'Satisfactory job, missed a few spots'),
('Pest Control', 'Robert Martinez', 5, 'Professional and effective, solved the issue completely'),
('Plumbing Service', 'Olivia Taylor', 4, 'Quick response and fixed the problem swiftly'),
('Electrical Repair', 'William Anderson', 2, 'Took longer than expected, but got the job done'),
('Roofing Service', 'Ava Thomas', 5, 'Excellent communication, high-quality workmanship');
