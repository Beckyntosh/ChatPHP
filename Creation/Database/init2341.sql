CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (email, password) VALUES ('user1@example.com', '$2y$10$CyG1Oe8k/n2YUHSqLf71he0LilKCH4pGGnEXcOZQRa8kM4xZmDj4K'),
('user2@example.com', '$2y$10$Bko64Iu0lF8mMVeTPaUfP.48yb6ErqaZj93.6YkO64bEhtB0ZBKUK'),
('user3@example.com', '$2y$10$MNvF6EMRxT6mwhL8W0OVWeqES/NdEJQYjMazTDg6pvXoavCPVIvLe'),
('user4@example.com', '$2y$10$F0kbfKZm/UMyv7YdadJIOuQqJx1XtemC9O9NJXzlfR5MdcFKLzmGC'),
('user5@example.com', '$2y$10$IeX15vvPkidvEpaniiH2aeE.Bbm2yxJpMNg9lEd/6Thh0gKkmrH3y'),
('user6@example.com', '$2y$10$A.KHxd67DD5S4eZNvLg7WOwpw04nnt7IwUJgVk1el7hto3QH76S2W'),
('user7@example.com', '$2y$10$QKk/Ys1c5heuJizpe.wzWuqjGqfdVdntDDUSwXKo1QmhNkR243i7O'),
('user8@example.com', '$2y$10$BYpXINc1zvMZl5yaxEWmsoqp2YK0ni5dG7LxjPuwBWpYheAiuvNxe'),
('user9@example.com', '$2y$10$G3rMSYgxfcTrJD36UaTAX.OIwtgXWpyeVA8Oxqey/earijwHxJzeK'),
('user10@example.com', '$2y$10$UzNVPHsmV2zLHR9pNklebeaHLWDpZ4A4iiUs1GXnWCr7FprM/jCAW');
