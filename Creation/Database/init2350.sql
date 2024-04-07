CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES ('john_doe', 'john.doe@example.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
('jane_smith', 'jane.smith@example.com', '202cb962ac59075b964b07152d234b70'),
('alex_jones', 'alex.jones@example.com', '900150983cd24fb0d6963f7d28e17f72'),
('sarah_brown', 'sarah.brown@example.com', '4297f44b13955235245b2497399d7a93'),
('michael_davis', 'michael.davis@example.com', 'e99a18c428cb38d5f260853678922e03'),
('emily_wilson', 'emily.wilson@example.com', '089c6ad8a045a7c8c6c1cf093bd66904'),
('adam_carter', 'adam.carter@example.com', 'c20ad4d76fe97759aa27a0c99bff6710'),
('lisa_jackson', 'lisa.jackson@example.com', '45c48cce2e2d7fbdea1afc51c7c6ad26'),
('chris_miller', 'chris.miller@example.com', 'd3d9446802a44259755d38e6d163e820'),
('megan_taylor', 'megan.taylor@example.com', '6512bd43d9caa6e02c990b0a82652dca');
