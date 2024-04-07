CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL
);

-- Insert values into users table
INSERT INTO users (name) VALUES ('John Doe'), ('Jane Smith'), ('Alice Johnson'), ('Bob Roberts'), ('Emily Brown');

-- Create products table
CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL
);

-- Insert values into products table
INSERT INTO products (name) VALUES ('Product A'), ('Product B'), ('Product C'), ('Product D'), ('Product E');

-- Insert more values into products table
INSERT INTO products (name) VALUES ('Product F'), ('Product G'), ('Product H'), ('Product I'), ('Product J');
