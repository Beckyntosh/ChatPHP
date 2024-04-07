CREATE TABLE IF NOT EXISTS gadget_reviews (
  id INT AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(255) NOT NULL,
  review TEXT NOT NULL,
  rating INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO gadget_reviews (product_name, review, rating) VALUES 
('iPhone 12', 'Great phone with excellent camera quality', 5),
('Samsung Galaxy S20', 'Good performance but battery life could be better', 4),
('Google Pixel 5', 'Impressive camera and stock Android experience', 5),
('OnePlus 8 Pro', 'Smooth performance and fast charging', 4),
('Sony Xperia 1 II', 'Amazing display and audio quality', 5),
('Xiaomi Mi 10 Pro', 'Value for money flagship with great features', 4),
('Huawei P40 Pro', 'Top-notch camera and design', 5),
('Moto G Power', 'Long-lasting battery but lacks some features', 3),
('LG Velvet', 'Sleek design but average performance', 3),
('Nokia 9 PureView', 'Innovative camera setup but slow processing', 2);
