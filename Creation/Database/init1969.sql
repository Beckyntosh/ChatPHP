CREATE TABLE IF NOT EXISTS print_orders (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
uploaded_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO print_orders (filename)
VALUES ('Wedding_Invitation_Design_1.pdf'),
('Wedding_Invitation_Design_2.jpg'),
('Wedding_Invitation_Design_3.jpeg'),
('Wedding_Invitation_Design_4.png'),
('Wedding_Invitation_Design_5.pdf'),
('Wedding_Invitation_Design_6.jpg'),
('Wedding_Invitation_Design_7.jpeg'),
('Wedding_Invitation_Design_8.png'),
('Wedding_Invitation_Design_9.pdf'),
('Wedding_Invitation_Design_10.jpg');