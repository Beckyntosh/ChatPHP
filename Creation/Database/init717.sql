CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    role VARCHAR(20) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL
);

INSERT INTO users (username, password, role) VALUES ('user1', 'pass1', 'admin');
INSERT INTO users (username, password, role) VALUES ('user2', 'pass2', 'user');
INSERT INTO users (username, password, role) VALUES ('user3', 'pass3', 'user');
INSERT INTO users (username, password, role) VALUES ('user4', 'pass4', 'admin');
INSERT INTO users (username, password, role) VALUES ('user5', 'pass5', 'user');

INSERT INTO products (name, description, price) VALUES ('Skateboard 1', 'High-quality wooden skateboard with unique design', 49.99);
INSERT INTO products (name, description, price) VALUES ('Skateboard 2', 'Carbon fiber skateboard for high performance', 79.99);
INSERT INTO products (name, description, price) VALUES ('Skateboard 3', 'Limited edition skateboard with hand-painted artwork', 99.99);
INSERT INTO products (name, description, price) VALUES ('Skateboard 4', 'Vintage style skateboard for collectors', 69.99);
INSERT INTO products (name, description, price) VALUES ('Skateboard 5', 'Customizable skateboard with your own design', 59.99);
