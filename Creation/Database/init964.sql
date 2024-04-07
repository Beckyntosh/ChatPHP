CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    restaurant VARCHAR(50) NOT NULL,
    review TEXT NOT NULL,
    food_quality INT NOT NULL,
    service INT NOT NULL,
    ambiance INT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO reviews (restaurant, review, food_quality, service, ambiance) VALUES 
('Restaurant A', 'Great food and service!', 5, 4, 5),
('Restaurant B', 'Average experience overall', 3, 3, 2),
('Restaurant C', 'Ambiance was amazing', 4, 3, 5),
('Restaurant D', 'Highly recommend the desserts', 5, 4, 4),
('Restaurant E', 'Service was a bit slow', 3, 2, 3),
('Restaurant F', 'Food quality was disappointing', 2, 3, 3),
('Restaurant G', 'Best steak I ever had', 5, 5, 4),
('Restaurant H', 'Lovely atmosphere', 4, 4, 5),
('Restaurant I', 'The staff went above and beyond', 5, 5, 5),
('Restaurant J', 'Will definitely be back', 4, 4, 4);
