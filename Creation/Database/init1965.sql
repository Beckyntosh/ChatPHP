CREATE TABLE IF NOT EXISTS printing_jobs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
status VARCHAR(50) NOT NULL DEFAULT 'pending',
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO printing_jobs (filename, status) VALUES ('Wedding_Invitation_Design_1.pdf', 'pending');
INSERT INTO printing_jobs (filename, status) VALUES ('Wedding_Invitation_Design_2.jpeg', 'pending');
INSERT INTO printing_jobs (filename, status) VALUES ('Wedding_Invitation_Design_3.png', 'pending');
INSERT INTO printing_jobs (filename, status) VALUES ('Wedding_Invitation_Design_4.pdf', 'pending');
INSERT INTO printing_jobs (filename, status) VALUES ('Wedding_Invitation_Design_5.jpg', 'pending');
INSERT INTO printing_jobs (filename, status) VALUES ('Wedding_Invitation_Design_6.png', 'pending');
INSERT INTO printing_jobs (filename, status) VALUES ('Wedding_Invitation_Design_7.pdf', 'pending');
INSERT INTO printing_jobs (filename, status) VALUES ('Wedding_Invitation_Design_8.jpg', 'pending');
INSERT INTO printing_jobs (filename, status) VALUES ('Wedding_Invitation_Design_9.jpeg', 'pending');
INSERT INTO printing_jobs (filename, status) VALUES ('Wedding_Invitation_Design_10.pdf', 'pending');
