CREATE TABLE IF NOT EXISTS wishlists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO wishlists (item_name) VALUES ('Acrylic Paint Set');
INSERT INTO wishlists (item_name) VALUES ('Watercolor Brushes');
INSERT INTO wishlists (item_name) VALUES ('Sketchbook');
INSERT INTO wishlists (item_name) VALUES ('Oil Pastels');
INSERT INTO wishlists (item_name) VALUES ('Canvas Panels');
INSERT INTO wishlists (item_name) VALUES ('Calligraphy Pen Set');
INSERT INTO wishlists (item_name) VALUES ('Drawing Pencils');
INSERT INTO wishlists (item_name) VALUES ('Paint Palette');
INSERT INTO wishlists (item_name) VALUES ('Brush Cleaner');
INSERT INTO wishlists (item_name) VALUES ('Canvas Stretchers');
