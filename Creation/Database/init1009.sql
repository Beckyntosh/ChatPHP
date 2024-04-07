CREATE TABLE IF NOT EXISTS reviews (
  id INT AUTO_INCREMENT PRIMARY KEY,
  gadget_name VARCHAR(255) NOT NULL,
  review TEXT NOT NULL,
  rating DECIMAL(2,1) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO reviews (gadget_name, review, rating) VALUES ('iPhone 12 Pro', 'Great phone overall', 4.5);
INSERT INTO reviews (gadget_name, review, rating) VALUES ('Samsung Galaxy S21 Ultra', 'Amazing camera quality', 4.8);
INSERT INTO reviews (gadget_name, review, rating) VALUES ('Google Pixel 5', 'Smooth performance', 4.2);
INSERT INTO reviews (gadget_name, review, rating) VALUES ('Sony WH-1000XM4', 'Best noise-cancelling headphones', 4.9);
INSERT INTO reviews (gadget_name, review, rating) VALUES ('Dyson V11 Absolute', 'Powerful cordless vacuum cleaner', 4.7);
INSERT INTO reviews (gadget_name, review, rating) VALUES ('Milwaukee M18 Fuel Chainsaw', 'Excellent performance for a battery-powered tool', 4.6);
INSERT INTO reviews (gadget_name, review, rating) VALUES ('Fiskars PowerGear2 Pruner', 'Comfortable grip and sharp blades', 4.3);
INSERT INTO reviews (gadget_name, review, rating) VALUES ('Scotts Elite Spreader', 'Even distribution of fertilizer', 4.4);
INSERT INTO reviews (gadget_name, review, rating) VALUES ('Toro TimeMaster Lawn Mower', 'Easy to use and efficient', 4.5);
INSERT INTO reviews (gadget_name, review, rating) VALUES ('Black and Decker Cordless Sweeper', 'Lightweight and powerful', 4.1);
