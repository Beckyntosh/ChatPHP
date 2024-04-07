CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  password VARCHAR(50),
  isActive BOOLEAN DEFAULT false,
  activationCode VARCHAR(64),
  reg_date TIMESTAMP
);

INSERT INTO users (username, email, password, activationCode) VALUES ('JohnDoe', 'johndoe@example.com', 'password123', 'a1b2c3d4');
INSERT INTO users (username, email, password, activationCode) VALUES ('JaneSmith', 'janesmith@example.com', 'qwerty789', 'e5f6g7h8');
INSERT INTO users (username, email, password, activationCode) VALUES ('AliceJohnson', 'alice.j@example.com', 'pass321', 'i9j0k1l2');
INSERT INTO users (username, email, password, activationCode) VALUES ('BobBrown', 'bob.brown@example.com', 'abcdef456', 'm3n4o5p6');
INSERT INTO users (username, email, password, activationCode) VALUES ('EvaWilliams', 'eva.w@example.com', 'mypassword', 'q7r8s9t0');
INSERT INTO users (username, email, password, activationCode) VALUES ('MikeDavis', 'mike.d@example.com', 'securepass', 'u1v2w3x4');
INSERT INTO users (username, email, password, activationCode) VALUES ('SarahMoore', 'sarah.m@example.com', 'letmein', 'y5z6a1b2');
INSERT INTO users (username, email, password, activationCode) VALUES ('MarkWilson', 'mark.w@example.com', 'p@ssw0rd', 'c3d4e5f6');
INSERT INTO users (username, email, password, activationCode) VALUES ('EmilyTaylor', 'emily.t@example.com', 'passtest', 'g7h8i9j0');
INSERT INTO users (username, email, password, activationCode) VALUES ('ChrisRoberts', 'chris.r@example.com', '12345678', 'k1l2m3n4');
