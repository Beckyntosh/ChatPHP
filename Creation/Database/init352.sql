CREATE TABLE IF NOT EXISTS user_preferences (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  homepage_layout VARCHAR(255) NOT NULL,
  theme VARCHAR(255) NOT NULL
);

INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES 
(1, 'classic', 'white'),
(1, 'modern', '#3E2723'),
(1, 'classic', '#3E2723'),
(1, 'modern', 'white'),
(1, 'classic', '#3E2723'),
(1, 'modern', 'white'),
(1, 'classic', '#3E2723'),
(1, 'modern', 'white'),
(1, 'classic', 'white'),
(1, 'modern', '#3E2723');