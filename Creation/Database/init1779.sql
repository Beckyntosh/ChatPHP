CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE password_resets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    token VARCHAR(255) NOT NULL,
    expires INT NOT NULL
);

INSERT INTO users (email, password) VALUES
('user1@example.com', '$2y$10$f9N/DO0eMWDG3XWyLDCqk.O3NB5FrZkakYz5B/s78Iy8L3jdb/qdG'),
('user2@example.com', '$2y$10$PY9M6Uk/vlpYLK7oDmPrajh.LhFSZ0pCI2KwHk2vLCLUO09N3cYVa'),
('user3@example.com', '$2y$10$LakpKTThJ4s9aiupDTIXKONwGklZo3PUipzZTfX6LLG0D5OWTsuE6'),
('user4@example.com', '$2y$10$XJhhBQvNfvjUAArebkCoReCT7dFSxL52CCzAZ5gC1J9VEpA.Quop2'),
('user5@example.com', '$2y$10$QE6jx3vU2d8AnzGQeoWw6.zhQQUZ0TsI60SxE2Kem0rI8rvxiiJty'),
('user6@example.com', '$2y$10$kZSd5I5VJW6sCTBGJREmveG6Xu3NEayMYv9VFFN.3AaL7pSSEzrT6'),
('user7@example.com', '$2y$10$gDSUaMeKgJEMNbOMXvNz8O.8PIyNhVcI.2V5tR.Z6.uWWC/4xd/vi'),
('user8@example.com', '$2y$10$HWgneCSuTNJJmrNCcG.xteOnk/ErXagdfUObW4sp4WhNV2xFP5ok2'),
('user9@example.com', '$2y$10$6fSyIccBPF4ddVxHdJLC0OX5o9Uy6cWY60KzwD1qUSOUWLJKwqUae'),
('user10@example.com', '$2y$10$CRWKQFcGxxOCdKqevK.bru5hzLiwaqCNb7WUkph2JYBcXBI9sdVT6');

INSERT INTO password_resets (email, token, expires) VALUES
('user1@example.com', 'a938b36f17f3e0b6f3c11fb1fbb2b9a3', 1634144166),
('user2@example.com', 'b0de6a16c0b4e9ca9287a1225455e242', 1634144466),
('user3@example.com', '1cb265e1071dbf288c9833889263db01', 1634144766),
('user4@example.com', '5ef420776dc45b809ab8620a88d92fae', 1634145066),
('user5@example.com', '657963a5f42550f84ac545b032f53381', 1634145366),
('user6@example.com', '8a89c7bb650ac22389b4c1837273cc4d', 1634145666),
('user7@example.com', 'f70db39a47db8735a7ac8fa4c8d5d6b9', 1634145966),
('user8@example.com', '7238892c2f5619c31119a725d27e4b83', 1634146266),
('user9@example.com', '3b8600dd12b6f36e1c17834d6bd0597d', 1634146566),
('user10@example.com', '303078d791b8762d91fe4356e5c89957', 1634146866);
