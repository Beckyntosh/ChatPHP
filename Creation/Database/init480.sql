CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('user1', '$2y$10$LJd4/g0pG2nW9.JHMNYbw.vUJZX6MD8LcPsFhpalibKg8XhCoU4Ly'),
('user2', '$2y$10$ODlp5y8IthlJ.ZRje1x0B.dDvQwX9QUSeITOoq/MpcfLhHj.ninr2'),
('user3', '$2y$10$k6hxkjctM0FfZ6eh9DzJsOlt2CIeTy3G3ayQxVZC8wGBv5ZMbLkhG'),
('user4', '$2y$10$jsZbZVuuBkpyQ7D.A5t/I.qwhgokhsMllP6UUe.JR019y1LLmvFWu'),
('user5', '$2y$10$40lmHSDV8Zz2T0434kNaoOtENOnPHqzDQ6r3TYkUePT4AGdTjpGy2'),
('user6', '$2y$10$YEu8H3HY/b8onXCmZy1Wv.WJxZ6TgXUhWjrrun8ycJ4gJ2dClzyyK'),
('user7', '$2y$10$YlwHTqU5nk/4W9DKQ3NbD.qS441dGKGdgRBfXBgaAFRlMwMkGmlRi'),
('user8', '$2y$10$Hby5j6s2J1gMJyq7QecNY.9.bMIrTncvA/rz/tNODFrpeQuJ3fyjO'),
('user9', '$2y$10$BwYaIoyzsYslVQdtX7iw4Osyd9XGMSL0QDJGsacfKF0oqP/28Dc9W'),
('user10', '$2y$10$0bltcv9fP2clXJto6yZ4BegjFQiFalgNxVqwA1WvwTHqFJ20kXIYq');
