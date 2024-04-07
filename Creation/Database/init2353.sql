CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES 
('john_doe', 'john.doe@example.com', '$2y$10$xJ0Im8L9p9zt/NovqCZon.bSb9VWfSd5wVd70n6I9fNpWKjT1UQOa'),
('jane_smith', 'jane.smith@example.com', '$2y$10$W3p4WY2QG9HRnmtgTnYVveQUF1pMCGycAJt/BqsNOqQRCoBWWf8.O'),
('alex_123', 'alex123@gmail.com', '$2y$10$8fdb.p3WSLZbFJLbrxe9sOqxc9CWprB5yTqsrch2cejzjS/s7SMJO'),
('emily_g', 'emily.g@yahoo.com', '$2y$10$H4IDgvFiCItR6uXnio47B.hyjBzdR/Wja25Eoo5nxCqOmHotwZR9O'),
('maximus_tech', 'maximus.tech@hotmail.com', '$2y$10$7sAIWZ1h6fw1MNC/lD3qLOQTeskTmcg.x2/P3rHmrbkCodMtNqF2i'),
('laura_89', 'laura89@outlook.com', '$2y$10$IDuaU/UKq4Jfv4aiNKYiotEEUhFXZJURjmqUSdKDZPAN6UchsDjZ2'),
('david.m', 'david.m@gmail.com', '$2y$10$36eDP4T0lR4MdWl8BEfTZOg7R5FYN7f0LmouJwaP0HeGXPlGu8E4S'),
('anna_xx', 'anna.xx@gmail.com', '$2y$10$0ZU3pQGcUyW/GJZnLc2qlO4aGzzIyqnXRXMMTZecDnDCIUYq7q52S'),
('techlover22', 'techlover22@hotmail.com', '$2y$10$2.FiVyKZT1o0q3prvMgwF.H2UIhVAky5K0ZrGGJAVDrmlHoYxTjXW'),
('sophia_789', 'sophia_789@gmail.com', '$2y$10$k9mOv73cFypF/tY.TROAIeY08AKXe8dw9KcQX/t5pA1EwWGo/RZJK');
