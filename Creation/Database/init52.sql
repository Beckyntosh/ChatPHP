-- Create roles table
CREATE TABLE IF NOT EXISTS roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

-- Insert values into roles table
INSERT INTO roles (name) VALUES 
('admin'),
('regular user'),
('guest');

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    role_id INT,
    FOREIGN KEY (role_id) REFERENCES roles(id)
) ENGINE=InnoDB;

-- Insert values into users table
INSERT INTO users (username, role_id) VALUES 
('john_doe', 1),
('jane_smith', 2),
('guest123', 3);

-- Create products table
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    visible TINYINT DEFAULT 1
) ENGINE=InnoDB;

-- Insert values into products table
INSERT INTO products (name, description, visible) VALUES 
('Product A', 'This is product A description.', 1),
('Product B', 'This is product B description.', 1),
('Product C', 'This is product C description.', 0),
('Product D', 'This is product D description.', 1),
('Product E', 'This is product E description.', 1),
('Product F', 'This is product F description.', 0),
('Product G', 'This is product G description.', 1),
('Product H', 'This is product H description.', 1),
('Product I', 'This is product I description.', 0),
('Product J', 'This is product J description.', 1);
