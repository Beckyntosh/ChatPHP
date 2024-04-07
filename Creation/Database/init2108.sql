CREATE TABLE IF NOT EXISTS items (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS wishlists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    item_id INT(6) UNSIGNED,
    FOREIGN KEY (item_id) REFERENCES items(id),
    reg_date TIMESTAMP
);

INSERT INTO items (name, description) VALUES ('Chair', 'Comfortable armchair for relaxing at home');
INSERT INTO items (name, description) VALUES ('Sofa', 'Elegant sofa for your living room');
INSERT INTO items (name, description) VALUES ('Vase', 'Decorative vase for adding a touch of style');
INSERT INTO items (name, description) VALUES ('Table', 'Sturdy and stylish table for your home');
INSERT INTO items (name, description) VALUES ('Lamp', 'Warm lighting option for a cozy ambiance');
INSERT INTO items (name, description) VALUES ('Cushion', 'Soft cushion for extra comfort on seating');
INSERT INTO items (name, description) VALUES ('Rug', 'Beautiful rug to tie the room together');
INSERT INTO items (name, description) VALUES ('Wall Art', 'Artistic piece for enhancing walls');
INSERT INTO items (name, description) VALUES ('Mirror', 'Reflective surface for visual appeal');
INSERT INTO items (name, description) VALUES ('Plant', 'Green plant for a touch of nature indoors');