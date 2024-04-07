CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
verified BOOLEAN DEFAULT 0,
verification_code VARCHAR(50),
reg_date TIMESTAMP
);

INSERT INTO users (username, email, password, verification_code)
VALUES ('Alice', 'alice@example.com', '$2y$10$cTAp1tq71hQ8KPQKbnbbKe.ChfF2R/vQpFdEM7NpszCW,.R0VHhFO', 'a81dc443638049f7e26c9a30f7ad1255'),
       ('Bob', 'bob@example.com', '$2y$10$yK/67zQoLiyHxmVZr7ZBluI7MjN6s3NQkqffhBzZdaJtPnwnFfrHO', '5f620b667a98ec1f674101226a9e3ec8'),
       ('Charlie', 'charlie@example.com', '$2y$10$cd0ufEVByn5.aoY8x7MQV.nrHzNuPYTyaDTzqnoqwiLr4j6Cz9G32', 'cfe634517ae8a9fd456d5baa6a9b9071'),
       ('David', 'david@example.com', '$2y$10$X2Z8eLjE4C1jwKJrT/uXzeZyMo1M9qalPinqPRJ9kn044baLNqXPy', '892ae926bcf79fa04e95d9812e48537c'),
       ('Eve', 'eve@example.com', '$2y$10$7HEx1U0cL4w6nlCUvCpq0uZ3cgiiu3U7w8QIEVi4ZXIzU6sywMU1S', 'b5db8cbeb14523899c316a0e91b21e23'),
       ('Frank', 'frank@example.com', '$2y$10$kBq2WtpdDQagXK1OZUhCN.60zgL8YnfVDE0/mewTylHIxk2GjfQMm', '6aa03c4154b97b6bb7c4d1caef10e91d'),
       ('Grace', 'grace@example.com', '$2y$10$5Ej8o6TQnGkI6KiJlCE1qOEgYvdnnmiM2NZ53NzZFsGHP72HTNL86', '04c10989e31f2b8e62997bbc2281b5b0'),
       ('Hank', 'hank@example.com', '$2y$10$YhKuVL2/Q9x.mApU4HYnW.cB0DZMztaeFb.jhlh.bRnTZmKY68Ah6', '2c4a3f7be80f0bf5ffed601fdabad8c2'),
       ('Ivy', 'ivy@example.com', '$2y$10$qD7bYDib8TTig/8Ec/qr1Omojy3f6BEk7P7ZPc8na5GEGCHWT5BYa', '6934c2a09169cf06b5b7d9c087c33c7e'),
       ('Jack', 'jack@example.com', '$2y$10$0LYRp9bRDI2hjQ6t75uSn.z.2z1RQO4V9SzHC1hZLfcKsRLv6Ut/2', '288ab4cde77feacabe660818f605ad31');
