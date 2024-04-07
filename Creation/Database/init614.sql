CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES
('john_doe', '$2y$10$N3Q6rP8gE/4rKRLCji48aO7AA3ErUwzGAcHfLiYMyBLn4akBnK7b2'), -- password is 'password1'
('jane_smith', '$2y$10$t5GnFjLyZFsQiqmhtqlz6OMHuGE01rkZbQOgtSbF8M5RdRACvTR2C'), -- password is 'password2'
('alex_jones', '$2y$10$RgdI/K40cqs1atjc8AgPBeUF3No9ESHWQeqoAVi/h/1HhKM/oAuPK'), -- password is 'password3'
('emily_davis', '$2y$10$KG61N4dm91ncBg1t7YUsy.jDZ5jlT8DZg9in1jSu9a0CYHZBuQgCW'), -- password is 'password4'
('michael_adams', '$2y$10$S3i.fjYAd1AQua2/LkWzA.Mi6593KcQWoMGdHWBMHb/EfAHVz9QBy'), -- password is 'password5'
('sarah_brown', '$2y$10$zMAnA7zyeZ2GGQvfnMukGe9FzBAuWQ3k4gTVxt4ffr6yNm2WU1E2e'), -- password is 'password6'
('nick_jackson', '$2y$10$vxE.7AbcrBJJ90itAyNkXOqed.X6h4B79gN4McUR4l8TsMbOaRcYO'), -- password is 'password7'
('olivia_wilson', '$2y$10$W9JQW4Y15UTe1JfBfKipmeFR.yvlrHzs6OJHPKaLY302OhXGwZb16'), -- password is 'password8'
('jacob_clark', '$2y$10$28c1SBljKvRfohZjn85A8OiMUY6GzwPc2BeO/osDrO/WYQ8/vPQoy'), -- password is 'password9'
('ava_king', '$2y$10$vM2wIc3kfX9jUvoBv5lB2.1WnmdFNoa1WiRa3Tj5iWXiK/EpXPa0O'); -- password is 'password10'
