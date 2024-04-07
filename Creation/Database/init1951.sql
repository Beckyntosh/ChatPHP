CREATE TABLE IF NOT EXISTS print_jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255),
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO print_jobs (filename) VALUES ('wedding_invitation_design1.jpg');
INSERT INTO print_jobs (filename) VALUES ('wedding_invitation_design2.jpg');
INSERT INTO print_jobs (filename) VALUES ('wedding_invitation_design3.jpg');
INSERT INTO print_jobs (filename) VALUES ('wedding_invitation_design4.jpg');
INSERT INTO print_jobs (filename) VALUES ('wedding_invitation_design5.jpg');
INSERT INTO print_jobs (filename) VALUES ('wedding_invitation_design6.jpg');
INSERT INTO print_jobs (filename) VALUES ('wedding_invitation_design7.jpg');
INSERT INTO print_jobs (filename) VALUES ('wedding_invitation_design8.jpg');
INSERT INTO print_jobs (filename) VALUES ('wedding_invitation_design9.jpg');
INSERT INTO print_jobs (filename) VALUES ('wedding_invitation_design10.jpg');
