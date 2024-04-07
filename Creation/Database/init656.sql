CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  description TEXT
);

INSERT INTO users (name, email) VALUES ('John Doe', 'john.doe@example.com');
INSERT INTO users (name, email) VALUES ('Jane Smith', 'jane.smith@example.com');
INSERT INTO users (name, email) VALUES ('Alice Johnson', 'alice.johnson@example.com');
INSERT INTO users (name, email) VALUES ('Bob Brown', 'bob.brown@example.com');
INSERT INTO users (name, email) VALUES ('Emily Davis', 'emily.davis@example.com');

INSERT INTO products (name, description) VALUES ('Wine', 'Red wine from France');
INSERT INTO products (name, description) VALUES ('Gadget', 'Tech gadget from Japan');
INSERT INTO products (name, description) VALUES ('Book', 'Mystery novel by a best-selling author');
INSERT INTO products (name, description) VALUES ('Artwork', 'Painting by a renowned artist');
INSERT INTO products (name, description) VALUES ('Fashion', 'Trendy clothing from a designer brand');