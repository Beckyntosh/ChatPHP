CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  password VARCHAR(50),
  token VARCHAR(64),
  status TINYINT(1) DEFAULT 0,
  reg_date TIMESTAMP
);

INSERT INTO users (username, email, password, token) VALUES ('JohnDoe', 'johndoe@example.com', 'pass123', 'e4ffd2e78b051111256ceea7b672b5a0');
INSERT INTO users (username, email, password, token) VALUES ('JaneSmith', 'janesmith@example.com', 'pass456', 'b212f173943a4e843447f164630d887e');
INSERT INTO users (username, email, password, token) VALUES ('AliceBrown', 'alicebrown@example.com', 'pass789', 'a8b9177419e0eac6c4634d4b8da5c81f');
INSERT INTO users (username, email, password, token) VALUES ('BobWhite', 'bobwhite@example.com', 'pass321', '2c5fa90d7522c22c08a26c088e2b8cf0');
INSERT INTO users (username, email, password, token) VALUES ('EllaGreen', 'ellagreen@example.com', 'pass654', '093f1d8bb5aaa2b676336f73b03a8a01');
INSERT INTO users (username, email, password, token) VALUES ('OliverBlack', 'oliverblack@example.com', 'pass987', '371ce1b7e3a949d59b749dfb2d3738cc');
INSERT INTO users (username, email, password, token) VALUES ('SophiaGrey', 'sophiagrey@example.com', 'pass147', '7ea1b2eca79a18da5c57e51cc23c6f07');
INSERT INTO users (username, email, password, token) VALUES ('CharlieBlue', 'charlieblue@example.com', 'pass258', '057fd62fe222f0c9e76c92c37324d02f');
INSERT INTO users (username, email, password, token) VALUES ('LucyRed', 'lucyred@example.com', 'pass369', 'f599f6db677f9c8b621c1716418352ea');
INSERT INTO users (username, email, password, token) VALUES ('LeoPurple', 'leopurple@example.com', 'pass654', 'e19f60fe7e8a447c0910d95e5aa962f1');
