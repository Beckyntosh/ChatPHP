CREATE TABLE IF NOT EXISTS print_orders (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO print_orders (filename) VALUES ('Wedding_Invitation_Design.pdf');
INSERT INTO print_orders (filename) VALUES ('Handbag_Design.jpeg');
INSERT INTO print_orders (filename) VALUES ('Turing_Style.png');
INSERT INTO print_orders (filename) VALUES ('Wedding_Invitation_2.pdf');
INSERT INTO print_orders (filename) VALUES ('Handbag_Design_2.jpeg');
INSERT INTO print_orders (filename) VALUES ('Turing_Style_2.png');
INSERT INTO print_orders (filename) VALUES ('Wedding_Invitation_3.pdf');
INSERT INTO print_orders (filename) VALUES ('Handbag_Design_3.jpeg');
INSERT INTO print_orders (filename) VALUES ('Turing_Style_3.png');
INSERT INTO print_orders (filename) VALUES ('Wedding_Invitation_4.pdf');
