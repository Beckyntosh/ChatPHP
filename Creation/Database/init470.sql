CREATE TABLE IF NOT EXISTS `conversion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ingredient` varchar(50) NOT NULL,
  `from_unit` varchar(10) NOT NULL,
  `to_unit` varchar(10) NOT NULL,
  `conversion_factor` double NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `conversion` (`ingredient`, `from_unit`, `to_unit`, `conversion_factor`) VALUES
('Flour', 'cups', 'grams', 125),
('Sugar', 'cups', 'grams', 200),
('Butter', 'cups', 'grams', 227),
('Milk', 'cups', 'ml', 236.588),
('Water', 'cups', 'ml', 236.588),
('Rice', 'grams', 'cups', 0.47),
('Oil', 'ml', 'cups', 0.004),
('Salt', 'grams', 'tsp', 6.2),
('Eggs', 'units', 'cups', 4),
('Cheese', 'grams', 'oz', 0.035274);