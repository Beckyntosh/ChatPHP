CREATE TABLE IF NOT EXISTS PrintingJobs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(200) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO PrintingJobs (filename) VALUES ('Wedding_Invitation_Design_1.jpg');
INSERT INTO PrintingJobs (filename) VALUES ('Wedding_Invitation_Design_2.jpg');
INSERT INTO PrintingJobs (filename) VALUES ('Wedding_Invitation_Design_3.jpg');
INSERT INTO PrintingJobs (filename) VALUES ('Wedding_Invitation_Design_4.jpg');
INSERT INTO PrintingJobs (filename) VALUES ('Wedding_Invitation_Design_5.jpg');
INSERT INTO PrintingJobs (filename) VALUES ('Wedding_Invitation_Design_6.jpg');
INSERT INTO PrintingJobs (filename) VALUES ('Wedding_Invitation_Design_7.jpg');
INSERT INTO PrintingJobs (filename) VALUES ('Wedding_Invitation_Design_8.jpg');
INSERT INTO PrintingJobs (filename) VALUES ('Wedding_Invitation_Design_9.jpg');
INSERT INTO PrintingJobs (filename) VALUES ('Wedding_Invitation_Design_10.jpg');