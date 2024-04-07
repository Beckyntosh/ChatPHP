CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(60) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (username, password, email) VALUES ('john_doe', '$2y$10$Gc.Te4EPJzz/Nd/IKXrHYeNXkF1STLY5W1f9UzshJajCVI91E9lX2', 'john.doe@email.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', '$2y$10$FF0.Wu8Z.RAwUV1F3FVGqO/xXcmJePOI2zK4N4QWdaLlfROD2.gm6', 'jane.smith@email.com');
INSERT INTO users (username, password, email) VALUES ('mike_jones', '$2y$10$bm6vO2DHZ0o/4oq1eG/XJutV4Z8QlCukdF7JRkOdDYmituTAMcWSm', 'mike.jones@email.com');
INSERT INTO users (username, password, email) VALUES ('sarah_brown', '$2y$10$ggWZZ36nI9SoXr7ArBoza.kqHfXaHqzzz8Eo2Ie9D2O4fngNgbZfW', 'sarah.brown@email.com');
INSERT INTO users (username, password, email) VALUES ('david_wilson', '$2y$10$GMYVqYJz2uASWrz1f/jLguF/BqhzkvuK464sMlrImvWMhQgp.W3De', 'david.wilson@email.com');
INSERT INTO users (username, password, email) VALUES ('lisa_garcia', '$2y$10$rAzmcRtKjnMDAC6k3MfxYeoovbDcYYaydTRiz1CeKkhr7Ih1UqLvG', 'lisa.garcia@email.com');
INSERT INTO users (username, password, email) VALUES ('kevin_thompson', '$2y$10$5t.BqnM7UilXHESlFl9gM.HN2gYstGrw8gFf2d8MYw52zb9xpu3iS', 'kevin.thompson@email.com');
INSERT INTO users (username, password, email) VALUES ('amanda_clark', '$2y$10$p6R3eibJplupymZaaiOz..WON37xDNSY4pmgvk1r0dlMizeJkyGYS', 'amanda.clark@email.com');
INSERT INTO users (username, password, email) VALUES ('ryan_roberts', '$2y$10$ZAXJCBwX80ezMfPnTKjz2.xusuL0WVGKMWUsNPotCW6iGikGhucEW', 'ryan.roberts@email.com');
INSERT INTO users (username, password, email) VALUES ('emily_davis', '$2y$10$y3iWahyLzNtbRngm3a3nE.aP6WEUoO8UjrBguCd9ErS0Gn/g7NEQm', 'emily.davis@email.com');
