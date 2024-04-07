CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, email, password) VALUES 
('john_doe', 'john.doe@example.com', 'password123'),
('jane_smith', 'jane.smith@example.com', 'securepw321'),
('mike_jones', 'mike.jones@example.com', 'p@ssw0rd'),
('sarah_adams', 'sarah.adams@example.com', 'sarah1234'),
('chris_brown', 'chris.brown@example.com', 'brownie89'),
('lisa_white', 'lisa.white@example.com', 'lisaLovesTech'),
('kevin_green', 'kevin.green@example.com', 'KevG_the_Techie'),
('anna_black', 'anna.black@example.com', 'black_anna'),
('mark_jackson', 'mark.jackson@example.com', 'marky_mark'),
('emily_baker', 'emily.baker@example.com', 'cookie_monster');