CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    avatar VARCHAR(255)
);

INSERT INTO users (username, email, avatar) VALUES ('JohnDoe', 'johndoe@example.com', 'uploads/avatar1.jpg');
INSERT INTO users (username, email, avatar) VALUES ('JaneSmith', 'janesmith@example.com', 'uploads/avatar2.jpg');
INSERT INTO users (username, email, avatar) VALUES ('AliceDoe', 'alicedoe@example.com', 'uploads/avatar3.jpg');
INSERT INTO users (username, email, avatar) VALUES ('BobJohnson', 'bjohnson@example.com', 'uploads/avatar4.jpg');
INSERT INTO users (username, email, avatar) VALUES ('SarahLee', 'sarahlee@example.com', 'uploads/avatar5.jpg');
INSERT INTO users (username, email, avatar) VALUES ('MikeWang', 'mikewang@example.com', 'uploads/avatar6.jpg');
INSERT INTO users (username, email, avatar) VALUES ('EmilyWilson', 'ewilson@example.com', 'uploads/avatar7.jpg');
INSERT INTO users (username, email, avatar) VALUES ('MattBrown', 'mattbrown@example.com', 'uploads/avatar8.jpg');
INSERT INTO users (username, email, avatar) VALUES ('OliviaDavis', 'odavis@example.com', 'uploads/avatar9.jpg');
INSERT INTO users (username, email, avatar) VALUES ('KevinNguyen', 'knguyen@example.com', 'uploads/avatar10.jpg');
