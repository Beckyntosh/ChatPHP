CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    restaurant VARCHAR(50) NOT NULL,
    review TEXT NOT NULL,
    rating INT(1) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO reviews (name, restaurant, review, rating) VALUES 
('John Doe', 'Best Burger Joint', 'The burgers here are amazing!', 5),
('Jane Smith', 'Italian Delight', 'The pasta was a bit overcooked', 3),
('Alice Johnson', 'Sushi Heaven', 'Fresh and delicious sushi rolls', 4),
('Bob Roberts', 'Taco Tuesdays', 'Great tacos, but small portion sizes', 3),
('Sarah Davis', 'Pizza Palace', 'The cheese pizza was divine', 5),
('Michael Brown', 'Seafood Shack', 'The shrimp scampi was superb', 4),
('Emily Wilson', 'Café Bistro', 'Lovely atmosphere and friendly staff', 5),
('David Lee', 'Thai Fusion', 'Spicy and flavorful dishes', 4),
('Michelle White', 'BBQ Smokehouse', 'The ribs were tender and flavorful', 4),
('Chris Taylor', 'Mediterranean Grill', 'Fresh and healthy options', 5);
