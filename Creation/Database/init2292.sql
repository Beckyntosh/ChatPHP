CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(255) NOT NULL,
    token VARCHAR(32) NOT NULL,
    verified TINYINT(1) NOT NULL DEFAULT 0,
    reg_date TIMESTAMP
);

INSERT INTO users (username, email, password, token, verified, reg_date) VALUES 
('john_doe', 'john.doe@example.com', '$2y$10$2WnVoZ2bwDVsUard.0l.YOTCUA97rs98w.Z8oobEp657Z.5YzZVPO', 'a5f1e514c38887c9b9715394ceed1f7b', 1, '2021-10-15 10:30:00'),
('jane_smith', 'jane.smith@example.com', '$2y$10$hBtQFL4RaQbfLlDAoicwFuTAYJm6eVU09Tk8RQnR4d0DmIG91A2la', '6d1ab76669a773a921b0191f670f6a8b', 1, '2021-10-15 11:45:00'),
('bob_jackson', 'bob.jackson@example.com', '$2y$10$Q97keRH9fJBlPS/4XBZNG.lDm3oC3hdhUNufquKEkvmncCQ3uG6um', 'f348e61c1563a88453cbe98b1bbeefed', 1, '2021-10-15 12:20:00'),
('emily_thompson', 'emily.thompson@example.com', '$2y$10$6OZ8EOCsF14CDtt6dCkQdOPF0REKWwK6dW4Js9OUGB93zW9P.NNCe', 'b40f69ad9111451506c5cb488f5d4a18', 1, '2021-10-15 13:00:00'),
('michael_clark', 'michael.clark@example.com', '$2y$10$JLRP0gCZa4/qD05NwXTeAu2V9jOp35r/1DpP6Zceu8l6m/a7O3H9u', 'cb9cf654be5a19216a709c4ad50d32c7', 1, '2021-10-15 14:15:00'),
('sarah_wilson', 'sarah.wilson@example.com', '$2y$10$t6.fR9q4fJTLQBzL3AqHx.uVoVVYio4.5zDOtlQeT.b8oUlQPzGmm', '2ae66f7c884ea72374d94e98d9abf3f3', 0, '2021-10-15 15:30:00'),
('alex_roberts', 'alex.roberts@example.com', '$2y$10$mq1xdly34CbFb2j3ZOygxeeOTNOsXj/7SB310oZjAC/kd2H8o3OgS', '9562d0aaf0844ddeaa05f361b84b0e1e', 0, '2021-10-15 16:45:00'),
('laura_baker', 'laura.baker@example.com', '$2y$10$aaJ4l5stPRcGFzSfN3Vzbe3k3.U7PMMccH/y1TI9NcptMmX3HMK9e', '63074d44d13eb80d0a4d2edafce12364', 0, '2021-10-15 17:00:00'),
('kevin_hernandez', 'kevin.hernandez@example.com', '$2y$10$dtinB2b3ZnJjwRRtj3EWjucTn5r1IC0N8JB8j4143x58dQI3.spIe', '811338971c5d3b1edd3aa3fa7c6798ed', 0, '2021-10-15 18:15:00'),
('katie_adams', 'katie.adams@example.com', '$2y$10$gv606VN.s6.gNV8n6d7vB.xtKcjo0p39Ql5Q13MLGtl4h5nK6mJbG', '369c7e760bcdb1ef4fc5b65a43b08168', 0, '2021-10-15 19:30:00');