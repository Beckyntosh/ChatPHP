CREATE TABLE IF NOT EXISTS print_orders (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO print_orders (file_name, file_path) VALUES 
('wedding_invitation_design_1.jpg', 'uploads/wedding_invitation_design_1.jpg'),
('wedding_invitation_design_2.png', 'uploads/wedding_invitation_design_2.png'),
('wedding_invitation_design_3.jpeg', 'uploads/wedding_invitation_design_3.jpeg'),
('wedding_invitation_design_4.gif', 'uploads/wedding_invitation_design_4.gif'),
('wedding_invitation_design_5.pdf', 'uploads/wedding_invitation_design_5.pdf'),
('wedding_invitation_design_6.jpg', 'uploads/wedding_invitation_design_6.jpg'),
('wedding_invitation_design_7.png', 'uploads/wedding_invitation_design_7.png'),
('wedding_invitation_design_8.jpeg', 'uploads/wedding_invitation_design_8.jpeg'),
('wedding_invitation_design_9.gif', 'uploads/wedding_invitation_design_9.gif'),
('wedding_invitation_design_10.pdf', 'uploads/wedding_invitation_design_10.pdf');