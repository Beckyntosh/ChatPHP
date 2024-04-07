CREATE TABLE IF NOT EXISTS newsletter_subscribers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    token VARCHAR(64) NOT NULL,
    confirmed TINYINT(1) NOT NULL DEFAULT 0,
    reg_date TIMESTAMP
);

-- Insert sample data into newsletter_subscribers table
INSERT INTO newsletter_subscribers (email, token) VALUES ('example1@example.com', 'a1b2c3d4e5f6');
INSERT INTO newsletter_subscribers (email, token) VALUES ('example2@example.com', 'g7h8i9j0k1');
INSERT INTO newsletter_subscribers (email, token) VALUES ('example3@example.com', 'l2m3n4o5p6');
INSERT INTO newsletter_subscribers (email, token) VALUES ('example4@example.com', 'q7r8s9t0u1');
INSERT INTO newsletter_subscribers (email, token) VALUES ('example5@example.com', 'v2w3x4y5z6');
INSERT INTO newsletter_subscribers (email, token) VALUES ('example6@example.com', 'A1B2C3D4E5F6');
INSERT INTO newsletter_subscribers (email, token) VALUES ('example7@example.com', 'G7H8I9J0K1');
INSERT INTO newsletter_subscribers (email, token) VALUES ('example8@example.com', 'L2M3N4O5P6');
INSERT INTO newsletter_subscribers (email, token) VALUES ('example9@example.com', 'Q7R8S9T0U1');
INSERT INTO newsletter_subscribers (email, token) VALUES ('example10@example.com', 'V2W3X4Y5Z6');
