CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (name, email, password) VALUES ('John Doe', 'johndoe@example.com', '$2y$10$9juGh2pZGQcWiQWj46zlmeUUfJN3i9l5c.dTOsOWv2QCei0z.QTDS'),
('Jane Smith', 'janesmith@example.com', '$2y$10$P2Qmr8fA9uGhKEmqqcgLoeSqhbJaSwo/3wnXD8OauK6m6lxesCs9C'),
('Alice Johnson', 'alicejohnson@example.com', '$2y$10$2JINJNGk3dgdtNuEAkXA6.hHl4T2fbRcWbk9a2b6OO3ksIzCtPiqG'),
('Bob Brown', 'bobbrown@example.com', '$2y$10$EpeWJ1it2W.k47lBdC/Jt.UItdnlncEFZjs3vM1J35a0RfOHMlpD6'),
('Sarah Lee', 'sarahlee@example.com', '$2y$10$SRpBFy2Z3y9wVW5bOarJMewbDeJoIiezmS3On0BlZTzkWU.JjVNFG'),
('Michael Wilson', 'michaelwilson@example.com', '$2y$10$uQ185QSBHaOqRp.alMQGlO5UuOeB4nBSPZv2o5cf/xnU1ALT2BvDu'),
('Emily Garcia', 'emilygarcia@example.com', '$2y$10$pMJ8UNfo2KgLX3eFWJqw5.4TkF8aPtvCCP8pZaLhtLm9.4oeO/U6q'),
('David Martinez', 'davidmartinez@example.com', '$2y$10$cGVe15H1ltbMZ6NltVAsqu/BYaE8wY.GWAzYvwdYo4DB2WHS//oIm'),
('Laura Rodriguez', 'laurarodriguez@example.com', '$2y$10$Pln3w9aL8J8AHQdj0h6JW.IJ9k1FCqjA1AfuOBgV23ID4iLn4Y0Nq'),
('Kevin Nguyen', 'kevinnguyen@example.com', '$2y$10$2C2pRdF2D6KFSZm1GpX2r.6EA8qTomYfgGbXuLhOzm3Wezsl8esAu');
