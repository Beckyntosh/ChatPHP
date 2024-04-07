CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO users (username, password, email) VALUES 
('john_doe', '$2y$10$2M1ERhQBdIk1Bib4mxyNU.t2wzQBX5V4BIM5NqDZi7I.VWwAHerjC', 'john.doe@example.com'),
('jane_smith', '$2y$10$XHcgngrbUQksrnGZUCf2YOPOwOGDN2ydYyXprhiGbnj8WcQlB7JxS', 'jane.smith@example.com'),
('alex_jones', '$2y$10$zTd8i.y72cKBEfE1NRo0DuhLB42zd85P99tUsK7EMQajE0Uva.ubS', 'alex.jones@example.com'),
('emily_wang', '$2y$10$ya/u5KRyOl2n3nGz61lde.IppAhALBfycDz2PlzAqcX5aUVf3IsNq', 'emily.wang@example.com'),
('michael_jackson', '$2y$10$zPGn9wFnF/K5Q1hE03gNvuNNOU1IuQ1rRrcKFEK7kKvx/Y4ReAx.e', 'michael.jackson@example.com'),
('susan_davis', '$2y$10$mdmuAiatJDaCtZ62gBw4heFT3ITkAJEeyn6Xw0O7/Ho3bho8/nIDi', 'susan.davis@example.com'),
('kevin_lee', '$2y$10$NnNZwd1OYgFS2WVdKOEHD.JEXTDZP0VxgDFgvfTzJajzBFAzRYQB6', 'kevin.lee@example.com'),
('lisa_miller', '$2y$10$EKrJbGlevg7llFzbhETqyOmvbdk0H4gUlzs35sT9zR75Nn2sil4PC', 'lisa.miller@example.com'),
('david_clark', '$2y$10$Q8c1rSRi5ywlsMh7vbcfe.ljIPzmHGBaqhjxKwoJnnur0JuMa1uQe', 'david.clark@example.com'),
('amanda_wilson', '$2y$10$BVrzB.kaXMArikrDk.CrossnpPBDKrVCv4ZyHtXmw7dNpJGaROJ4i', 'amanda.wilson@example.com');
