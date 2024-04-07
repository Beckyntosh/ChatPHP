CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO users (username, password, email) VALUES ('john_doe', '$2y$10$CngO.f0294oqB3EQpCpsAu9zKzoQ6ge7sJjJz4IxA4PiLssff8lFy', 'john.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', '$2y$10$ZLrAf3l3bGtXQltZHpVVnOqGmZB67ZzLPIf77DgO6yu0dm6dgvE5O', 'jane.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('mike_jones', '$2y$10$WrT/NNneL1AEHUupj5A0dOksefjfx.A7OJb4N6g85oh9aP6y4S2ge', 'mike.jones@example.com');
INSERT INTO users (username, password, email) VALUES ('sarah_adams', '$2y$10$gX2g4Ak5JQlsf3Y5BhtVBObU6HHv8wGlTiQYY8gS/oVmc523F2M1a', 'sarah.adams@example.com');
INSERT INTO users (username, password, email) VALUES ('alex_smith', '$2y$10$IpP0NvT4a/356dP1dQQdnOtR7xL145q62XCnmd/bV4j0pAqn/d8jS', 'alex.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('emily_brown', '$2y$10$fcfRzPJWYgAb3QD9..1wpufV8Q/XK3QyvwpS5jFoIAp2dhW3nGya6', 'emily.brown@example.com');
INSERT INTO users (username, password, email) VALUES ('david_wilson', '$2y$10$o80fTLX3QxypbMvX3NKeDu2JkL9y.9ZrFhHXIy9tZ5EnxpK8C12wm', 'david.wilson@example.com');
INSERT INTO users (username, password, email) VALUES ('lisa_jackson', '$2y$10$gXV6whI9GcHfN8DBy0UpJeCpXA7LtYiGPPVtcGGX2H.zVPbk8uca2', 'lisa.jackson@example.com');
INSERT INTO users (username, password, email) VALUES ('mark_lucas', '$2y$10$7x1vyyfmS../GSf.PpNPD.EE8ujEjY.1duRYfCmEv3PmK2.hvpFAS', 'mark.lucas@example.com');
INSERT INTO users (username, password, email) VALUES ('karen_white', '$2y$10$UZ/WA39gECqx1UJ.FzhXEuk6vHX91MddKEqh9jf2Qt7GmURgC6AqG', 'karen.white@example.com');