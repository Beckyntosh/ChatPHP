CREATE TABLE IF NOT EXISTS wedding_invitations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO wedding_invitations (filename) VALUES ('wedding_invitation_1.jpg');
INSERT INTO wedding_invitations (filename) VALUES ('wedding_invitation_2.jpg');
INSERT INTO wedding_invitations (filename) VALUES ('wedding_invitation_3.jpg');
INSERT INTO wedding_invitations (filename) VALUES ('wedding_invitation_4.jpg');
INSERT INTO wedding_invitations (filename) VALUES ('wedding_invitation_5.jpg');
INSERT INTO wedding_invitations (filename) VALUES ('wedding_invitation_6.jpg');
INSERT INTO wedding_invitations (filename) VALUES ('wedding_invitation_7.jpg');
INSERT INTO wedding_invitations (filename) VALUES ('wedding_invitation_8.jpg');
INSERT INTO wedding_invitations (filename) VALUES ('wedding_invitation_9.jpg');
INSERT INTO wedding_invitations (filename) VALUES ('wedding_invitation_10.jpg');