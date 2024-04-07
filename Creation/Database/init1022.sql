CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    review TEXT NOT NULL,
    rating INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO reviews (destination, author, review, rating) VALUES 
('Paris', 'John Doe', 'Beautiful city with amazing architecture', 5),
('Tokyo', 'Alice Smith', 'Great food and friendly people', 4),
('London', 'Michael Johnson', 'Lots of historical sites to visit', 4),
('Sydney', 'Emma Brown', 'Fantastic beaches and outdoor activities', 5),
('New York', 'Sophia Wilson', 'City that never sleeps, lots to explore', 4),
('Dubai', 'David Lee', 'Luxury shopping and impressive skyscrapers', 3),
('Rome', 'Olivia Anderson', 'Rich history and delicious food', 5),
('Cairo', 'Daniel Garcia', 'Fascinating archaeological sites', 4),
('Rio de Janeiro', 'Isabella Martinez', 'Vibrant culture and beautiful beaches', 5),
('Amsterdam', 'Ethan Thompson', 'Charming canals and unique architecture', 4);
