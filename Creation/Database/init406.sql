CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(30) NOT NULL,
password VARCHAR(255) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
);

INSERT INTO users (username, password, email) VALUES 
('john_doe', '$2y$10$XnY/I6aSfLgIklDMZXojVOP32PPO6Sayywb2XRtEfahDZHllcesTu', 'john_doe@example.com'),
('jane_smith', '$2y$10$L0ejVsQiTqC/n7RIDd84xuzWyG3vy4Mq/g.uIxgA84Tn6ay4NNKrS', 'jane_smith@example.com'),
('bob_jackson', '$2y$10$7U3w0UL7P0vzIcoPzm0Rj.ywf6SBo783HSnz/6rL8Y6B77K3uEMjG', 'bob_jackson@example.com'),
('emily_white', '$2y$10$Fh/5eUvasGQbase4visBXOc9I5s32TqtVd4OccxGGgosBCBhYuOpy', 'emily_white@example.com'),
('michael_brown', '$2y$10$Po43u9Cc7kH0mPptfi1xD.hzuf947j1WCzln6OHjGZ5DeBodDxvRK', 'michael_brown@example.com'),
('sarah_miller', '$2y$10$495oPU2R.04N/RVK3xnC2OALM6B7hs2ajB8.RJMXmFV5Dq.AHsAGy', 'sarah_miller@example.com'),
('kevin_adams', '$2y$10$e5Pdm1bxB0tQj4bK03QmROiU8PrKFOVLq5jbA9sFTrF10Un0G987.', 'kevin_adams@example.com'),
('laura_jones', '$2y$10$C7bWIOZJIuBdGhGRUfKg9OXcMCazpO.h6tHCJrrwTOP40WkPyHsIG', 'laura_jones@example.com'),
('daniel_davis', '$2y$10$YzQIWUEIVf8TnevKxBZZvOraVrA1U..zTTVDI8Ji3UN7Lac.8lgPW', 'daniel_davis@example.com'),
('amanda_king', '$2y$10$UtbeBnjVUySUzhmwapZQZeUp9TCegwoTPdMVY7fMd.GwPUFfiYfh6', 'amanda_king@example.com');
