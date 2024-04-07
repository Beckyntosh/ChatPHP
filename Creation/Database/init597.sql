CREATE TABLE users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  password VARCHAR(32) NOT NULL
);

INSERT INTO users (username, password) VALUES
('john_doe', '1a2b3c4d'),
('jane_smith', '5e6f7g8h'),
('adam_jones', '9i0j1k2l'),
('sarah_miller', '3m4n5o6p'),
('michael_brown', '7q8r9s0t'),
('laura_wilson', '1u2v3w4x'),
('chris_evans', '5y6z7a8b'),
('emily_harris', '9c0d1e2f'),
('david_thomas', '3g4h5i6j'),
('olivia_taylor', '7k8l9m0n');