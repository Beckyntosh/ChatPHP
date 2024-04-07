-- Use this SQL script with your MySQL database to initialize the comment section for your makeup blog.

-- Create the `comments` table
CREATE TABLE IF NOT EXISTS comments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    comment TEXT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert sample comments into the `comments` table
INSERT INTO comments (username, comment) VALUES
('Alex', 'Love this blog! So informative and fun.'),
('Jordan', 'Great tips on makeup. Thanks for sharing!'),
('Casey', 'I tried the eyeshadow technique and it worked wonders.'),
('Riley', 'This blog is a gem. Keep the posts coming!'),
('Taylor', 'Your recommendations are always spot on. Thank you!'),
('Morgan', 'Just what I needed to read today. Inspirational!'),
('Jamie', 'The DIY skincare routine is amazing. Saw results in a week!'),
('Quinn', 'Can you do a review on the latest makeup brushes?'),
('Charlie', 'Your makeup tutorials are the best. Easy to follow.'),
('Drew', 'I love the vibrant community here. So positive and supportive!');

-- This script creates the necessary table for the comments and inserts initial sample data to get started.
