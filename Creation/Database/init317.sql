CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  password VARCHAR(255) NOT NULL,
  two_factor_secret VARCHAR(255),
  backup_codes VARCHAR(255),
  reg_date TIMESTAMP
);

INSERT INTO users (username, password, two_factor_secret, backup_codes)
VALUES ('john_doe', '$2y$10$7NeEcUnVsBldEFa2tmeG.dxzY9Z5HJe4.WZz1Re1pPNyVJI7BdEV2', 'ABC123', 'a1b2c3d4e5'),
       ('jane_smith', '$2y$10$J7cq4UIica5JbGxrlC0pkOk6PzWZpkh4J0ATo7dnj/HGkiQz8xT/W', 'DEF456', 'f6g7h8i9j0'),
       ('alice', '$2y$10$lGwT8epW2E5pOk.VjeklC.Iwrn4bIz/07eQVTG2gnlLbLKSGiPhjK', 'GHI789', 'k1l2m3n4o5'),
       ('bob', '$2y$10$Z3jhGytkIg.tMSGW9nePh.KMi2lYcUPR.gJ3b8Vs0lv3zSovZYmzm', 'JKL012', 'p6q7r8s9t0'),
       ('test_user', '$2y$10$uNZMh78VQ4Y5hccdphA.WudRCSHdgfa6BrLo8ZjGf2r0gGh5cnz9G', 'MNO345', 'u1v2w3x4y5'),
       ('user123', '$2y$10$sKl4HG.CWvzKcjlUUX4jSuZpq3SdIi7Glkp3MOPeLMhQ6t7JjTnmq', 'PQR678', 'z1a2b3c4d5'),
       ('new_user', '$2y$10$raffW5vEnR25Wk5JHSTaWemORpc55.qHg9IMlqXDec7NdfM9p75Si', 'STU901', 'e5f6g7h8i9'),
       ('admin_user', '$2y$10$iik6wq8Jy6YjQ/JnKs2V2.dubFn/xGL0FRQHObzVPpc0iK1w/ii.m', 'VWX234', 'j0k1l2m3n4'),
       ('superuser', '$2y$10$PR3Da0QGSjjv4exL3HuKU.LLHAxO1b6OFQadvzIOTzDwwg5.XHOPK', 'YZA567', 'o5p6q7r8s9'),
       ('secure_user', '$2y$10$YjG1m/TkhSyVkW1DQn5DCeK1cWDgqZYo148q4N9SX317We67qy4BC', 'BCD890', 't0u1v2w3x4');