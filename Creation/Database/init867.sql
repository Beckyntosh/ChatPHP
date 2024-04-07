CREATE TABLE IF NOT EXISTS articles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
content TEXT NOT NULL,
category VARCHAR(30) NOT NULL
);

INSERT INTO articles (title, content, category) VALUES
('How to Build a Gaming PC', 'Step-by-step guide on building your own gaming PC', 'DIY'),
('Top Beach-Themed Desktop Wallpapers', 'Collection of stunning beach desktop wallpapers', 'Wallpapers'),
('Troubleshooting Common PC Issues', 'Tips on fixing common computer problems', 'Tech Support'),
('Creating a Productivity Setup', 'Organize your workspace for maximum productivity', 'Workspace'),
('Choosing the Right Hardware for Your Needs', 'Guide to selecting the best hardware components', 'Hardware'),
('Software Recommendations for Writers', 'Useful software for creative writers and bloggers', 'Software'),
('Enhancing Your Gaming Experience', 'Ways to improve your gaming setup and performance', 'Gaming'),
('Tips for Cable Management', 'Keep your desktop clean and organized with cable management', 'Organization'),
('Maintaining Your Computer for Longevity', 'Tips for extending the lifespan of your desktop', 'Maintenance'),
('How to Customize Your Desktop Theme', 'Personalize your desktop with custom themes and icons', 'Customization');
