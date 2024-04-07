CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
property_name VARCHAR(100) NOT NULL,
agent_name VARCHAR(100),
rating INT(2),
review TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO reviews (property_name, agent_name, rating, review) VALUES
('Beautiful House on Main Street', 'John Doe', 4, 'Great location and spacious rooms'),
('Cozy Apartment in the Suburbs', 'Jane Smith', 5, 'Loved the modern amenities and convenience'),
('Luxury Condo in the City Center', 'Tom Johnson', 3, 'Nice view but noisy neighbors'),
('Family-Friendly Home near Schools', 'Emily Brown', 4, 'Perfect for our family needs'),
('Rustic Cabin in the Woods', 'Robert Davis', 3, 'Beautiful surroundings but limited amenities'),
('Charming Townhouse in Historic District', 'Sarah Wilson', 5, 'Quaint and charming, loved the neighborhood'),
('Modern Loft in Trendy Area', 'Michael Lee', 4, 'Spacious and well-designed layout'),
('Elegant Mansion with Pool', 'Amanda White', 5, 'Luxurious and stunning property'),
('Beachfront Villa with Private Access', 'Chris Roberts', 5, 'Paradise by the sea'),
('Mountain Retreat with Panoramic Views', 'Laura Adams', 4, 'Peaceful escape with breathtaking scenery');
