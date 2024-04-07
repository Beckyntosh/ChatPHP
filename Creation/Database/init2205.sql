CREATE TABLE IF NOT EXISTS newsletter_signups (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    token VARCHAR(32) NOT NULL,
    confirmed TINYINT NOT NULL DEFAULT 0,
    signup_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO newsletter_signups (email, token, confirmed) VALUES 
('example1@example.com', 'f43adf23e23f', 1),
('example2@example.com', '23fdfs3443dd', 0),
('example3@example.com', '4d3fd34fd33d', 1),
('example4@example.com', 'gdfg32r32c23', 0),
('example5@example.com', '3r3fcf2323df', 1),
('example6@example.com', '4f43df34d343', 0),
('example7@example.com', 'g34dft34dgd3', 1),
('example8@example.com', 'fd33dff33fdf', 0),
('example9@example.com', '4ffdf343d3df', 1),
('example10@example.com', 'd34343d33f34', 0);
