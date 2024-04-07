CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        password VARCHAR(255),
        reg_date TIMESTAMP
    );

INSERT INTO users (name, email, password) VALUES ('John Doe', 'john.doe@example.com', '$2y$10$sNAiAMbJhPwFOZOqGSHg5.le6tOxjMqup/Lx2F.yMilW0HSYWyZ6K'),
                                                 ('Alice Johnson', 'alice.johnson@example.com', '$2y$10$N1XZ7J8EXpQL7vagbYVlge0YqpZd7Ya7pUsYOu6tNqb0P6FvBn2WW'),
                                                 ('Mark Smith', 'mark.smith@example.com', '$2y$10$aUdjgxVEu1mhgQk9v9iRZuxKkUQuJ8p6gIbbUgvKICi9p22fJ1HE2'),
                                                 ('Emily Brown', 'emily.brown@example.com', '$2y$10$qzsK2AtuhOPBIPoKIpLdpOrA4OSQT2r88Ow6a8hBK/W36RJ1Iybdy'),
                                                 ('Ryan Wilson', 'ryan.wilson@example.com', '$2y$10$KPtNacx01Tf5OxLIwJpdQuDn7/ugNQ6dEWiRFGJLmweNc8BOCIcfg'),
                                                 ('Emma Davis', 'emma.davis@example.com', '$2y$10$OdD/Y8JhWKx9gR00gRg5IuSGp6wj9Nq2P4mPWpp8aozAgb5ok0aGS'),
                                                 ('Michael Clark', 'michael.clark@example.com', '$2y$10$kV8uo1ZiWyqZ2v/8VCXy.eQe4LAnwI7CAGUXaq6XF/1lloFVPOCPi'),
                                                 ('Samantha White', 'samantha.white@example.com', '$2y$10$BvFgxfoSuHa7DSGXow0SCIbeXh0znWaLrT5t/kR3englXE8BF6Oo2'),
                                                 ('Daniel Lee', 'daniel.lee@example.com', '$2y$10$4vlEz2ZS5fKtGMQ/YZa0BenYyATdt4crNuPmSN.3DbouOylLqFvn2'),
                                                 ('Olivia Martinez', 'olivia.martinez@example.com', '$2y$10$zDTdLb8mm4OgZ4j2DgX5hOv9.acp7REov9PCVXNbXSThbmBiDwsk.')
