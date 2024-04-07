CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    price DECIMAL(10,2) NOT NULL
);

-- Insert values
INSERT INTO users (name, email) VALUES ('John Doe', 'john.doe@example.com');
INSERT INTO users (name, email) VALUES ('Jane Smith', 'jane.smith@example.com');
INSERT INTO users (name, email) VALUES ('Alice Johnson', 'alice.johnson@example.com');
INSERT INTO users (name, email) VALUES ('Bob Brown', 'bob.brown@example.com');
INSERT INTO users (name, email) VALUES ('Eva Martinez', 'eva.martinez@example.com');

INSERT INTO products (name, price) VALUES ('Sunglasses', 50.00);
INSERT INTO products (name, price) VALUES ('Hat', 20.00);
INSERT INTO products (name, price) VALUES ('Necklace', 30.00);
INSERT INTO products (name, price) VALUES ('Earrings', 15.00);
INSERT INTO products (name, price) VALUES ('Bracelet', 25.00);
