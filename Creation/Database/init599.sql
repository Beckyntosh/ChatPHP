CREATE TABLE IF NOT EXISTS social_media_links (
    id INT AUTO_INCREMENT PRIMARY KEY,
    platform_name VARCHAR(100),
    link VARCHAR(255)
);

INSERT INTO social_media_links (platform_name, link) VALUES 
('Facebook', 'https://facebook.com/YOUR_BUSINESS_PAGE'),
('Twitter', 'https://twitter.com/YOUR_BUSINESS_PAGE'),
('Instagram','https://instagram.com/YOUR_BUSINESS_PAGE'),
('LinkedIn', 'https://linkedin.com/YOUR_BUSINESS_PAGE'),
('YouTube', 'https://youtube.com/YOUR_BUSINESS_PAGE'),
('Pinterest', 'https://pinterest.com/YOUR_BUSINESS_PAGE'),
('Snapchat', 'https://snapchat.com/YOUR_BUSINESS_PAGE'),
('TikTok', 'https://tiktok.com/YOUR_BUSINESS_PAGE'),
('Reddit', 'https://reddit.com/YOUR_BUSINESS_PAGE'),
('Tumblr', 'https://tumblr.com/YOUR_BUSINESS_PAGE')
ON DUPLICATE KEY UPDATE link=VALUES(link);
