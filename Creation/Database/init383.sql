CREATE TABLE IF NOT EXISTS users (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(255),
reg_date TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES ('john_doe', 'john.doe@example.com', '$2y$10$lnF4AJmJerOv4EheCU/Ew.MPD3BsR1WcMvZ1iwYpxWMHl7TzEzKNK'),
('jane_smith', 'jane.smith@example.com', '$2y$10$znRiRZ7R4lMAvzIKiEFEL.v6dxvvKeoD5SzZm5Ciyt6ZkhUYJU3fO'),
('billy_mack', 'billy.mack@example.com', '$2y$10$jhyZsATQJXCbg4e3B16G0.o4p8.cKOfoE2PZohX6rnsbGWaluLZsS'),
('susan_adams', 'susan.adams@example.com', '$2y$10$pDfk.L.3MHAomYU6Uimd2.rhAzkTF/b3je3TfFhfuyZLn43oGVvLe'),
('tom_wilson', 'tom.wilson@example.com', '$2y$10$6Kh171t7zgWC5u9lgeCyoXw8T.H/XDbdCJ2N72dP0RIbf1GU9wwgW'),
('linda_jones', 'linda.jones@example.com', '$2y$10$nFmFLjpX7.hdZaY.LawEueCmR2fQZ5chANDOxRH3w88BtD.5AMvG2'),
('mike_brown', 'mike.brown@example.com', '$2y$10$9yyjgJE3sHwJlpbOF7Mg7.qvHxejpnMJu4TlMVT7eKLJa16tJ40Bi'),
('emma_white', 'emma.white@example.com', '$2y$10$atRnv3AtKBzPE2Zs2zMetylPZ3oiDOIuwKo/yhiLcbaUtPHFy9Dna'),
('peter_green', 'peter.green@example.com', '$2y$10$z0w1iq6Jx2wYj3ctyS7Y9OB.theRmd1gmL4ruwHRe9fLjpyaa4axW'),
('sophie_taylor', 'sophie.taylor@example.com', '$2y$10$Teq6f2/v//OqOoMjvns9ZO14idvqbqn4au/0xoOnASyOzd0NG8Kk6');
