CREATE TABLE IF NOT EXISTS videos (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255),
description TEXT,
category VARCHAR(100),
url VARCHAR(255),
upload_date DATE
);

INSERT INTO videos (title, description, category, url, upload_date) VALUES
('Fashion Trends 2021', 'Discover the latest fashion trends for 2021', 'Fashion', 'https://www.example.com/fashion_trends_2021', '2021-05-15'),
('Summer Lookbook', 'Get inspired with this summer lookbook', 'Fashion', 'https://www.example.com/summer_lookbook', '2021-06-28'),
('Street Style Guide', 'Learn how to master street style with this guide', 'Fashion', 'https://www.example.com/street_style_guide', '2021-07-10'),
('Sustainable Fashion Tips', 'Tips on incorporating sustainable fashion into your wardrobe', 'Fashion', 'https://www.example.com/sustainable_fashion_tips', '2021-08-05'),
('DIY Clothing Hacks', 'Transform your wardrobe with these DIY clothing hacks', 'Fashion', 'https://www.example.com/diy_clothing_hacks', '2021-09-12'),
('Makeup Tutorial: Smokey Eyes', 'Step-by-step tutorial for achieving smokey eye makeup', 'Beauty', 'https://www.example.com/smokey_eyes_tutorial', '2021-10-20'),
('Skincare Routine for Glowing Skin', 'Follow this skincare routine for glowing and healthy skin', 'Beauty', 'https://www.example.com/skincare_routine', '2021-11-05'),
('Hair Styling Tips', 'Learn how to style your hair like a pro with these tips', 'Beauty', 'https://www.example.com/hair_styling_tips', '2021-12-15'),
('Workout at Home', 'Effective workout routines you can do at home', 'Fitness', 'https://www.example.com/workout_at_home', '2022-01-02'),
('Healthy Recipes', 'Discover healthy and delicious recipes for a balanced diet', 'Fitness', 'https://www.example.com/healthy_recipes', '2022-02-10');
