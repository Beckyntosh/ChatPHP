CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES
('user1', '$2y$10$PjBuVHklcmugInzHa.4vkuBtaizJv3iXAcj3Kv2cIHox30c8B7gPm'), 
('user2', '$2y$10$zSPJ8DeOcJzYnsNn6floVu5xkNOMaDUnnHIr1MDqYycGY86DpH5jm'), 
('user3', '$2y$10$Pzl8L77Vl9Q.YX7/dVbvqOkkGKc5IBYbLzv8lYPTLY5pH6T/dHS.u'), 
('user4', '$2y$10$1bdbIAnZbtWFmDFAWIRxb.m52ctgh5Y/6jGJBYNs4Iu4.5dya4gS2'), 
('user5', '$2y$10$y0GPZ0bbLZp7TX.FOrR97eViGXlAU.8bnYEs77iy10DMdfUTbeC6S'), 
('user6', '$2y$10$k4PlsQgDWe8xiS1T1dppi.3/MS1vyAGo5SctfLAoGlO8tN/10/20S'), 
('user7', '$2y$10$lF4lArdHTNBwYZCqBUqXKO8o.WADJWgxkq0CuVzKYNzHsUf3BqRfG'), 
('user8', '$2y$10$FHq8awlTkCtAA/N7jr2Ug.pmWjK7YHWTMzFzOEUttprqc3.APW514'), 
('user9', '$2y$10$v6.UHJ4AfIi8C9yyMNazReAPS6Wt.LZXqBhGC8t/7UdMsqiaIxOL2'), 
('user10', '$2y$10$KP5NRuTfuuQsQE4paswPBOugndXwKmbiVr4sMpXbUHc3UY.NaKP1K'); 