CREATE TABLE IF NOT EXISTS users (
              id INT AUTO_INCREMENT PRIMARY KEY,
              username VARCHAR(50) NOT NULL,
              email VARCHAR(100) NOT NULL,
              language VARCHAR(10) NOT NULL,
              reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO users (username, email, language) VALUES ('john_doe', 'john.doe@example.com', 'English');
INSERT INTO users (username, email, language) VALUES ('jane_smith', 'jane.smith@example.com', 'French');
INSERT INTO users (username, email, language) VALUES ('michael_robinson', 'michael.robinson@example.com', 'German');
INSERT INTO users (username, email, language) VALUES ('maria_garcia', 'maria.garcia@example.com', 'Spanish');
INSERT INTO users (username, email, language) VALUES ('david_williams', 'david.williams@example.com', 'English');
INSERT INTO users (username, email, language) VALUES ('laura_johnson', 'laura.johnson@example.com', 'Spanish');
INSERT INTO users (username, email, language) VALUES ('sophie_brown', 'sophie.brown@example.com', 'French');
INSERT INTO users (username, email, language) VALUES ('adam_miller', 'adam.miller@example.com', 'German');
INSERT INTO users (username, email, language) VALUES ('olivia_smith', 'olivia.smith@example.com', 'English');
INSERT INTO users (username, email, language) VALUES ('chloe_anderson', 'chloe.anderson@example.com', 'French');
