CREATE TABLE IF NOT EXISTS sunglasses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    image_url VARCHAR(255)
);

-- Insert sample data into the sunglasses table
INSERT INTO sunglasses (name, price, description, image_url) VALUES
('Aviator Sunglasses', 50.00, 'Classic aviator style sunglasses with metal frame and dark lenses.', 'images/aviator.jpg'),
('Wayfarer Sunglasses', 45.00, 'Iconic wayfarer style sunglasses with plastic frame and trendy color options.', 'images/wayfarer.jpg'),
('Round Sunglasses', 55.00, 'Vintage round sunglasses with thin metal frame and UV protection lenses.', 'images/round.jpg'),
('Cat Eye Sunglasses', 60.00, 'Elegant cat eye style sunglasses with oversized frames and gradient lenses.', 'images/cat-eye.jpg'),
('Sport Sunglasses', 40.00, 'Performance sport sunglasses designed for outdoor activities and sports.', 'images/sport.jpg'),
('Polarized Sunglasses', 65.00, 'Polarized sunglasses for glare reduction and enhanced visibility in bright conditions.', 'images/polarized.jpg'),
('Oversized Sunglasses', 70.00, 'Trendy oversized sunglasses for a bold fashion statement and UV protection.', 'images/oversized.jpg'),
('Square Sunglasses', 50.00, 'Square frame sunglasses for a modern look and various lens colors.', 'images/square.jpg'),
('Retro Sunglasses', 55.00, 'Retro style sunglasses with colorful frames and mirrored lenses for a vintage vibe.', 'images/retro.jpg'),
('Fashion Sunglasses', 45.00, 'Fashionable sunglasses with unique designs and embellishments for a chic appearance.', 'images/fashion.jpg');

