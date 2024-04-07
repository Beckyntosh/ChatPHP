CREATE TABLE IF NOT EXISTS print_jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO print_jobs (file_name, file_path) VALUES ('Wedding_Invitation_1', 'uploads/Wedding_Invitation_1.jpg');
INSERT INTO print_jobs (file_name, file_path) VALUES ('Wedding_Invitation_2', 'uploads/Wedding_Invitation_2.jpg');
INSERT INTO print_jobs (file_name, file_path) VALUES ('Wedding_Invitation_3', 'uploads/Wedding_Invitation_3.jpg');
INSERT INTO print_jobs (file_name, file_path) VALUES ('Wedding_Invitation_4', 'uploads/Wedding_Invitation_4.jpg');
INSERT INTO print_jobs (file_name, file_path) VALUES ('Wedding_Invitation_5', 'uploads/Wedding_Invitation_5.jpg');
INSERT INTO print_jobs (file_name, file_path) VALUES ('Wedding_Invitation_6', 'uploads/Wedding_Invitation_6.jpg');
INSERT INTO print_jobs (file_name, file_path) VALUES ('Wedding_Invitation_7', 'uploads/Wedding_Invitation_7.jpg');
INSERT INTO print_jobs (file_name, file_path) VALUES ('Wedding_Invitation_8', 'uploads/Wedding_Invitation_8.jpg');
INSERT INTO print_jobs (file_name, file_path) VALUES ('Wedding_Invitation_9', 'uploads/Wedding_Invitation_9.jpg');
INSERT INTO print_jobs (file_name, file_path) VALUES ('Wedding_Invitation_10', 'uploads/Wedding_Invitation_10.jpg');
