CREATE TABLE IF NOT EXISTS clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS interaction_logs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
client_id INT(6) UNSIGNED,
interaction_detail TEXT NOT NULL,
interaction_date TIMESTAMP,
FOREIGN KEY (client_id) REFERENCES clients(id)
);

INSERT INTO clients (firstname, lastname, email) VALUES 
('John', 'Doe', 'johndoe@example.com'),
('Alice', 'Smith', 'alice.smith@example.com'),
('Bob', 'Johnson', 'bjohnson@example.com'),
('Sarah', 'Williams', 'swilliams@example.com'),
('Mike', 'Brown', 'mbrown@example.com'),
('Emily', 'Davis', 'edavis@example.com'),
('Chris', 'Wilson', 'cwilson@example.com'),
('Michelle', 'Lee', 'mlee@example.com'),
('David', 'Martinez', 'dmartinez@example.com'),
('Laura', 'Clark', 'lclark@example.com');
