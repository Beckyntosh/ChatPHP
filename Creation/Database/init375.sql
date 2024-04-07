CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
verification_code VARCHAR(50),
verified INT(1) DEFAULT 0,
reg_date TIMESTAMP
);

INSERT INTO users (username, email, password, verification_code) VALUES 
('JohnDoe', 'johndoe@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '4a219'),
('JaneSmith', 'janesmith@example.com', '202cb962ac59075b964b07152d234b70', 'fd6bc'),
('AliceWonder', 'alicewonder@example.com', 'c4ca4238a0b923820dcc509a6f75849b', 'e2f21'),
('BobBrown', 'bobbrown@example.com', 'c81e728d9d4c2f636f067f89cc14862c', 'd89da'),
('EveJohnson', 'evejohnson@example.com', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'c6fc1'),
('CharlieWilson', 'charliewilson@example.com', 'a87ff679a2f3e71d9181a67b7542122c', 'cea9b'),
('GraceMoore', 'gracemoore@example.com', 'e4da3b7fbbce2345d7772b0674a318d5', 'de1aa'),
('DavidClark', 'davidclark@example.com', '1679091c5a880faf6fb5e6087eb1b2dc', '916d8'),
('SarahAdams', 'sarahadams@example.com', '8f14e45fceea167a5a36dedd4bea2543', '4289f'),
('KevinLee', 'kevinlee@example.com', 'f95b87f4e78ecdd10b3aa049ed462c12', 'ac362');
