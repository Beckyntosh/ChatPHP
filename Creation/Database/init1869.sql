CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS coupons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    coupon_code VARCHAR(50) NOT NULL UNIQUE,
    user_id INT NOT NULL,
    discount_percentage INT NOT NULL,
    is_used BOOLEAN NOT NULL DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO users (username, email, password) VALUES 
('john_doe', 'john.doe@example.com', 'hashedpassword1'),
('jane_smith', 'jane.smith@example.com', 'hashedpassword2'),
('alice_green', 'alice.green@example.com', 'hashedpassword3'),
('bob_jones', 'bob.jones@example.com', 'hashedpassword4'),
('susan_white', 'susan.white@example.com', 'hashedpassword5'),
('mike_brown', 'mike.brown@example.com', 'hashedpassword6'),
('lisa_gray', 'lisa.gray@example.com', 'hashedpassword7'),
('david_miller', 'david.miller@example.com', 'hashedpassword8'),
('emily_young', 'emily.young@example.com', 'hashedpassword9'),
('chris_harris', 'chris.harris@example.com', 'hashedpassword10');

INSERT INTO coupons (coupon_code, user_id, discount_percentage) VALUES 
('WELCOMEABCD01', 1, 20),
('WELCOMEXYZ01', 2, 20),
('WELCOME1234', 3, 20),
('WELCOMEMY45', 4, 20),
('WELCOMEHI67', 5, 20),
('WELCOMEJK89', 6, 20),
('WELCOMEUV12', 7, 20),
('WELCOMEQR34', 8, 20),
('WELCOMETU56', 9, 20),
('WELCOMEKL78', 10, 20);
