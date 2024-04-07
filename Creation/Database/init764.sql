CREATE TABLE IF NOT EXISTS influencers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  description TEXT,
  niche VARCHAR(100),
  followers INT,
  engagement_rate DECIMAL(5, 2)
);

INSERT INTO influencers (name, description, niche, followers, engagement_rate) VALUES 
('Influencer1', 'Description 1', 'Fashion', 5000, 5.25),
('Influencer2', 'Description 2', 'Fitness', 10000, 4.75),
('Influencer3', 'Description 3', 'Travel', 8000, 6.20),
('Influencer4', 'Description 4', 'Food', 12000, 7.30),
('Influencer5', 'Description 5', 'Lifestyle', 15000, 4.90),
('Influencer6', 'Description 6', 'Beauty', 6000, 6.75),
('Influencer7', 'Description 7', 'Tech', 7000, 5.80),
('Influencer8', 'Description 8', 'Gaming', 9000, 6.40),
('Influencer9', 'Description 9', 'Parenting', 7500, 4.60),
('Influencer10', 'Description 10', 'DIY', 11000, 5.90);
