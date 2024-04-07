CREATE TABLE IF NOT EXISTS printing_jobs (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  file_path VARCHAR(255) NOT NULL,
  upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO printing_jobs (filename, file_path) VALUES 
('Design1.jpg', 'uploads/Design1.jpg'),
('Design2.png', 'uploads/Design2.png'),
('Design3.pdf', 'uploads/Design3.pdf'),
('Design4.docx', 'uploads/Design4.docx'),
('Design5.jpg', 'uploads/Design5.jpg'),
('Design6.png', 'uploads/Design6.png'),
('Design7.pdf', 'uploads/Design7.pdf'),
('Design8.docx', 'uploads/Design8.docx'),
('Design9.jpg', 'uploads/Design9.jpg'),
('Design10.png', 'uploads/Design10.png');