CREATE TABLE IF NOT EXISTS users (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS products (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50)
);

INSERT INTO users (username) VALUES ('John Doe');
INSERT INTO users (username) VALUES ('Jane Smith');
INSERT INTO users (username) VALUES ('Alice Johnson');
INSERT INTO users (username) VALUES ('Bob Brown');
INSERT INTO users (username) VALUES ('Emily Davis');

INSERT INTO products (name) VALUES ('Face Cream');
INSERT INTO products (name) VALUES ('Hair Oil');
INSERT INTO products (name) VALUES ('Perfume');
INSERT INTO products (name) VALUES ('Body Lotion');
INSERT INTO products (name) VALUES ('Shampoo');
