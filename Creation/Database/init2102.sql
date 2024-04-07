CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, email, password) VALUES 
('john_doe', 'john@example.com', '$2y$10$GWAgGX3e/GDqEPrU8jpMg.CQm6GeUHIDelk7tgk1Fabc'),
('jane_smith', 'jane@example.com', '$2y$10$5iR14zpH84KCtACXcKM.CeKrmpSl6GAnuPfJ0C32QeQf'),
('alex_james', 'alex@example.com', '$2y$10$YbUq8ehG1HxHPi1OSTQp2.u9SafjSA4E6xGQ.w4zEaEH'),
('sara_williams', 'sara@example.com', '$2y$10$a9k8iJ/I0D6/h2gQI/aM3e2sxztD9dzWT1rSvarolz4c'),
('michael_brown', 'michael@example.com', '$2y$10$jGmLobt.q3sjRy8DpRQtoOjT96lLfntrWf1pJN2FNje8'),
('laura_davis', 'laura@example.com', '$2y$10$axdLeVxOsC2toSQo9l6hZu8Ma5EF5wV12.CnpeE1xfY/'),
('adam_miller', 'adam@example.com', '$2y$10$bg9c7z6vWWiK0JvC8wgqdue1EQFqU2v4s0.HjWbpF3U0'),
('amy_wilson', 'amy@example.com', '$2y$10$LCXavi/ZMIcWC5p74r.3dubl9s2LlQdAkhX8qAM98pQR'),
('david_rodriguez', 'david@example.com', '$2y$10$2GAeD1WtYEhkLysl/hHDme1ykpvoaNmM0AEBoON3EKSE'),
('linda_martinez', 'linda@example.com', '$2y$10$jRfbg0TVQ82y6VWn.hoIWeeiG3Vl5PcnTa0XVBkLCKTZ');
