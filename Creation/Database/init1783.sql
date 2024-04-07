CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('JohnDoe', '$2y$10$c2VjcmV0X3RvcmU=');
INSERT INTO users (username, password) VALUES ('JaneSmith', '$2y$10$Zmlyc3RfbW9vbg==');
INSERT INTO users (username, password) VALUES ('AliceJohnson', '$2y$10$YWxpY2Vqc29u');
INSERT INTO users (username, password) VALUES ('BobBrown', '$2y$10$Ym9ib3duX3JvYw==');
INSERT INTO users (username, password) VALUES ('EmilyDavis', '$2y$10$RW1pbHlfZGF2aXM=');
INSERT INTO users (username, password) VALUES ('MichaelWilson', '$2y$10$TWljaGFlbF93aWxzb24=');
INSERT INTO users (username, password) VALUES ('SarahJones', '$2y$10$U2FyYWpvbmVzb24=');
INSERT INTO users (username, password) VALUES ('DavidMartinez', '$2y$10$RGF2aWRNYXJ0aW5leg==');
INSERT INTO users (username, password) VALUES ('LauraGarcia', '$2y$10$TGF1cmEHZWxm');
INSERT INTO users (username, password) VALUES ('KevinLopez', '$2y$10$S2V2aW5Mb3Bl');
