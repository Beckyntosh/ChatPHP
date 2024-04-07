CREATE TABLE IF NOT EXISTS printing_jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filepath VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO printing_jobs (filename, filepath) VALUES ('design1.pdf', 'uploads/design1.pdf');
INSERT INTO printing_jobs (filename, filepath) VALUES ('design2.jpg', 'uploads/design2.jpg');
INSERT INTO printing_jobs (filename, filepath) VALUES ('design3.png', 'uploads/design3.png');
INSERT INTO printing_jobs (filename, filepath) VALUES ('design4.jpeg', 'uploads/design4.jpeg');
INSERT INTO printing_jobs (filename, filepath) VALUES ('design5.pdf', 'uploads/design5.pdf');
INSERT INTO printing_jobs (filename, filepath) VALUES ('design6.jpg', 'uploads/design6.jpg');
INSERT INTO printing_jobs (filename, filepath) VALUES ('design7.png', 'uploads/design7.png');
INSERT INTO printing_jobs (filename, filepath) VALUES ('design8.jpeg', 'uploads/design8.jpeg');
INSERT INTO printing_jobs (filename, filepath) VALUES ('design9.pdf', 'uploads/design9.pdf');
INSERT INTO printing_jobs (filename, filepath) VALUES ('design10.jpg', 'uploads/design10.jpg');