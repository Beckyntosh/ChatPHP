CREATE TABLE subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    token VARCHAR(100) NOT NULL,
    confirmed TINYINT NOT NULL
);

INSERT INTO subscribers (email, token, confirmed) VALUES 
('email1@example.com', '2a6990a72b5a3b1b86143d38c9c678f19255d08a8d14e7b1d8', 1),
('email2@example.com', 'f032517417b205ca97686b962c7475a08b7ae22cfdd34bf660', 0),
('email3@example.com', '615f0386611757123d598d14f984148bfb1344533d57b9e8ec', 1),
('email4@example.com', '2ef350a5a7230c2def6d0c01c0336d15776cf59034f01903c7', 0),
('email5@example.com', '3c85a6443abf6d1f6fd79d30322c42a2007fd59b65c90aa19e', 1),
('email6@example.com', 'b9adcb98f3c53e5356b3c5f30d80a528515be2040c003a24bd', 0),
('email7@example.com', '15b42d1cba231a507ac731971ca27c83d8e22c1f8bf8b83708', 1),
('email8@example.com', '69c8ed7aad112a5aebeaa35d270d923fde3e2d89bd6b1c8c81', 0),
('email9@example.com', 'f5972a2ec2c578d6cb66827d79339ec912f949a58133b97915', 1),
('email10@example.com', 'e55bd5fcdca8bfac258bda7c902928d85f8123c88da856b42b', 0);
