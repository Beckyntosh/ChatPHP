CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description TEXT NOT NULL,
    category VARCHAR(50),
    price DECIMAL(10, 2) NOT NULL,
    ratings DECIMAL(2, 1),
    reg_date TIMESTAMP
);

INSERT INTO products (name, description, category, price, ratings) VALUES ('Pen', 'Blue pen for writing', 'Stationery', 1.50, 4.5);
INSERT INTO products (name, description, category, price, ratings) VALUES ('Notebook', 'A5 size lined notebook', 'Stationery', 5.99, 4.0);
INSERT INTO products (name, description, category, price, ratings) VALUES ('Stapler', 'Office stapler', 'Stationery', 8.99, 3.5);
INSERT INTO products (name, description, category, price, ratings) VALUES ('Scissors', 'Sharp scissors for cutting', 'Stationery', 3.50, 4.2);
INSERT INTO products (name, description, category, price, ratings) VALUES ('Highlighter', 'Yellow highlighter', 'Stationery', 1.99, 4.7);
INSERT INTO products (name, description, category, price, ratings) VALUES ('Binder', '3-ring binder for organizing papers', 'Stationery', 4.75, 4.0);
INSERT INTO products (name, description, category, price, ratings) VALUES ('Desk Organizer', 'Organizer for pens, clips, and notes', 'Office Supplies', 12.99, 4.5);
INSERT INTO products (name, description, category, price, ratings) VALUES ('Paper Clips', 'Box of assorted paper clips', 'Stationery', 0.99, 3.8);
INSERT INTO products (name, description, category, price, ratings) VALUES ('Printer Paper', 'Pack of 500 sheets white paper', 'Office Supplies', 6.49, 4.2);
INSERT INTO products (name, description, category, price, ratings) VALUES ('Post-it Notes', 'Pack of 100 3x3 inch sticky notes', 'Office Supplies', 2.99, 4.6);
