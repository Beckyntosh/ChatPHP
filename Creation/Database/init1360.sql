CREATE TABLE IF NOT EXISTS custom_orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    dimensions VARCHAR(255) NOT NULL,
    details TEXT,
    reg_date TIMESTAMP
);

INSERT INTO custom_orders (product_name, dimensions, details) VALUES
('Wooden Dining Table', '150x90x75 cm', 'Custom finish with special engraving'),
('Custom Bookshelf', '200x100x40 cm', 'Painted in white color'),
('Custom Bed Frame', '180x200 cm', 'Minimalistic design with storage'),
('Custom Desk', '120x60x75 cm', 'Drawer compartments for organization'),
('Custom Wardrobe', '200x180x60 cm', 'Sliding doors with mirrors'),
('Custom Coffee Table', '100x100x40 cm', 'Glass top with steel base'),
('Custom Sideboard', '150x40x80 cm', 'Solid wood construction'),
('Custom Sofa Set', '3-seater and 2-seater', 'Fabric upholstery in grey color'),
('Custom TV Stand', '160x40x50 cm', 'Open shelves and closed compartments'),
('Custom Kitchen Island', '150x90x90 cm', 'Marble countertop with storage cabinets');
