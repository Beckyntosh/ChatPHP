CREATE TABLE IF NOT EXISTS sunglasses_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    style VARCHAR(255) NOT NULL,
    sales INT(11) NOT NULL
);

INSERT INTO sunglasses_data (style, sales) VALUES ('Aviator', 100);
INSERT INTO sunglasses_data (style, sales) VALUES ('Wayfarer', 150);
INSERT INTO sunglasses_data (style, sales) VALUES ('Round', 75);
INSERT INTO sunglasses_data (style, sales) VALUES ('Cat Eye', 120);
INSERT INTO sunglasses_data (style, sales) VALUES ('Square', 90);
INSERT INTO sunglasses_data (style, sales) VALUES ('Oversized', 80);
INSERT INTO sunglasses_data (style, sales) VALUES ('Rectangle', 110);
INSERT INTO sunglasses_data (style, sales) VALUES ('Sport', 70);
INSERT INTO sunglasses_data (style, sales) VALUES ('Shield', 95);
INSERT INTO sunglasses_data (style, sales) VALUES ('Rimless', 85);
