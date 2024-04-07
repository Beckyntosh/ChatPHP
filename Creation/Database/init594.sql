CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    email VARCHAR(50)
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    price DECIMAL(10,2)
);

INSERT INTO users (name, email) VALUES ('John Doe', 'john.doe@example.com');
INSERT INTO users (name, email) VALUES ('Jane Smith', 'jane.smith@example.com');
INSERT INTO users (name, email) VALUES ('Alice Johnson', 'alice.johnson@example.com');
INSERT INTO users (name, email) VALUES ('Bob Brown', 'bob.brown@example.com');
INSERT INTO users (name, email) VALUES ('Emma Davis', 'emma.davis@example.com');
INSERT INTO users (name, email) VALUES ('Michael Wilson', 'michael.wilson@example.com');
INSERT INTO users (name, email) VALUES ('Sarah Lee', 'sarah.lee@example.com');
INSERT INTO users (name, email) VALUES ('David Thompson', 'david.thompson@example.com');
INSERT INTO users (name, email) VALUES ('Olivia Martinez', 'olivia.martinez@example.com');
INSERT INTO users (name, email) VALUES ('James Garcia', 'james.garcia@example.com');

INSERT INTO products (title, price) VALUES ('Product A', 25.50);
INSERT INTO products (title, price) VALUES ('Product B', 15.75);
INSERT INTO products (title, price) VALUES ('Product C', 30.00);
INSERT INTO products (title, price) VALUES ('Product D', 10.99);
INSERT INTO products (title, price) VALUES ('Product E', 50.25);
INSERT INTO products (title, price) VALUES ('Product F', 18.50);
INSERT INTO products (title, price) VALUES ('Product G', 40.75);
INSERT INTO products (title, price) VALUES ('Product H', 12.99);
INSERT INTO products (title, price) VALUES ('Product I', 35.50);
INSERT INTO products (title, price) VALUES ('Product J', 20.25);