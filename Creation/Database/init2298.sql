CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(50),
    verified BOOLEAN DEFAULT FALSE,
    verification_code VARCHAR(50),
    reg_date TIMESTAMP
);

-- Inserting sample data into the users table
INSERT INTO users (username, email, password, verification_code, reg_date) VALUES 
('john_doe', 'john.doe@example.com', '$2y$10$XxIb/L15v4lVkzSWBnKrV.z3f14gM6XNejhDVlEU0nMjb52TSSCNO', 'dfe34r3edq23rfw3', CURRENT_TIMESTAMP),
('jane_smith', 'jane.smith@example.com', '$2y$10$XxIb/L15v4lVkzSWBnKrV.z3f14gM6XNejhDVlEU0nMjb52TSSCNO', 'sdf32rf43grji9', CURRENT_TIMESTAMP),
('alex123', 'alex123@email.com', '$2y$10$XxIb/L15v4lVkzSWBnKrV.z3f14gM6XNejhDVlEU0nMjb52TSSCNO', 'rfsd2f34g3qwe', CURRENT_TIMESTAMP),
('amy98', 'amy98@example.com', '$2y$10$XxIb/L15v4lVkzSWBnKrV.z3f14gM6XNejhDVlEU0nMjb52TSSCNO', '23rfsd4gw3dsfr', CURRENT_TIMESTAMP),
('sammy22', 'sammy22@email.com', '$2y$10$XxIb/L15v4lVkzSWBnKrV.z3f14gM6XNejhDVlEU0nMjb52TSSCNO', '32fr34g43rg4g4', CURRENT_TIMESTAMP),
('lisa7', 'lisa7@example.com', '$2y$10$XxIb/L15v4lVkzSWBnKrV.z3f14gM6XNejhDVlEU0nMjb52TSSCNO', '45t34g3d3gdqwe', CURRENT_TIMESTAMP),
('michael87', 'michael87@email.com', '$2y$10$XxIb/L15v4lVkzSWBnKrV.z3f14gM6XNejhDVlEU0nMjb52TSSCNO', 'r3df23gqdf34q3', CURRENT_TIMESTAMP),
('emily99', 'emily99@example.com', '$2y$10$XxIb/L15v4lVkzSWBnKrV.z3f14gM6XNejhDVlEU0nMjb52TSSCNO', '23rdfsw3dd3fq3', CURRENT_TIMESTAMP),
('jack51', 'jack51@email.com', '$2y$10$XxIb/L15v4lVkzSWBnKrV.z3f14gM6XNejhDVlEU0nMjb52TSSCNO', 'r32rf3g4r3ehb2', CURRENT_TIMESTAMP),
('sophie42', 'sophie42@example.com', '$2y$10$XxIb/L15v4lVkzSWBnKrV.z3f14gM6XNejhDVlEU0nMjb52TSSCNO', 'sdf32gerg36wqg', CURRENT_TIMESTAMP);