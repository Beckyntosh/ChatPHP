-- Create table if not exists
CREATE TABLE IF NOT EXISTS software_packages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    version VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    package_file VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert 10 values into the table
INSERT INTO software_packages (name, version, author, package_file) VALUES
('Package 1', '1.0', 'Author A', 'uploads/package1.zip'),
('Package 2', '2.0', 'Author B', 'uploads/package2.zip'),
('Package 3', '3.0', 'Author C', 'uploads/package3.zip'),
('Package 4', '4.0', 'Author D', 'uploads/package4.zip'),
('Package 5', '5.0', 'Author E', 'uploads/package5.zip'),
('Package 6', '6.0', 'Author F', 'uploads/package6.zip'),
('Package 7', '7.0', 'Author G', 'uploads/package7.zip'),
('Package 8', '8.0', 'Author H', 'uploads/package8.zip'),
('Package 9', '9.0', 'Author I', 'uploads/package9.zip'),
('Package 10', '10.0', 'Author J', 'uploads/package10.zip');
