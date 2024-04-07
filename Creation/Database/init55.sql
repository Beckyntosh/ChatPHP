CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  role ENUM('admin', 'customer', 'staff') NOT NULL,
  permission_level INT NOT NULL
);

CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description TEXT,
  available_to ENUM('admin', 'customer', 'staff') NOT NULL
);

INSERT INTO users (username, role, permission_level) VALUES ('Alice', 'admin', 1);
INSERT INTO users (username, role, permission_level) VALUES ('Bob', 'customer', 2);
INSERT INTO users (username, role, permission_level) VALUES ('Charlie', 'staff', 3);
INSERT INTO users (username, role, permission_level) VALUES ('David', 'admin', 1);
INSERT INTO users (username, role, permission_level) VALUES ('Eve', 'customer', 2);
INSERT INTO users (username, role, permission_level) VALUES ('Frank', 'staff', 3);
INSERT INTO users (username, role, permission_level) VALUES ('Grace', 'admin', 1);
INSERT INTO users (username, role, permission_level) VALUES ('Henry', 'customer', 2);
INSERT INTO users (username, role, permission_level) VALUES ('Ivy', 'staff', 3);
INSERT INTO users (username, role, permission_level) VALUES ('Jack', 'admin', 1);

INSERT INTO products (name, description, available_to) VALUES ('Product1', 'Description1', 'admin');
INSERT INTO products (name, description, available_to) VALUES ('Product2', 'Description2', 'customer');
INSERT INTO products (name, description, available_to) VALUES ('Product3', 'Description3', 'staff');
INSERT INTO products (name, description, available_to) VALUES ('Product4', 'Description4', 'admin');
INSERT INTO products (name, description, available_to) VALUES ('Product5', 'Description5', 'customer');
INSERT INTO products (name, description, available_to) VALUES ('Product6', 'Description6', 'staff');
INSERT INTO products (name, description, available_to) VALUES ('Product7', 'Description7', 'admin');
INSERT INTO products (name, description, available_to) VALUES ('Product8', 'Description8', 'customer');
INSERT INTO products (name, description, available_to) VALUES ('Product9', 'Description9', 'staff');
INSERT INTO products (name, description, available_to) VALUES ('Product10', 'Description10', 'admin');
