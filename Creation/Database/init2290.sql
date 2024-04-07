CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  password VARCHAR(50),
  verified INT(1) DEFAULT 0,
  verification_code VARCHAR(50),
  reg_date TIMESTAMP
);

INSERT INTO users (username, email, password, verified, verification_code, reg_date) 
VALUES ('JohnDoe', 'johndoe@example.com', 'password1', 1, 'abc123', '2022-01-01 12:00:00'),
       ('JaneSmith', 'janesmith@example.com', 'password2', 1, 'def456', '2022-02-01 13:00:00'),
       ('AliceJones', 'alicejones@example.com', 'password3', 0, 'ghi789', '2022-03-01 14:00:00'),
       ('BobBrown', 'bobbrown@example.com', 'password4', 0, 'jkl012', '2022-04-01 15:00:00'),
       ('EmmaWhite', 'emmawhite@example.com', 'password5', 1, 'mno345', '2022-05-01 16:00:00'),
       ('MikeDavis', 'mikedavis@example.com', 'password6', 1, 'pqr678', '2022-06-01 17:00:00'),
       ('SarahMiller', 'sarahmiller@example.com', 'password7', 0, 'stu901', '2022-07-01 18:00:00'),
       ('AlexTaylor', 'alextaylor@example.com', 'password8', 0, 'vwx234', '2022-08-01 19:00:00'),
       ('GraceWilson', 'gracewilson@example.com', 'password9', 1, 'yzab56', '2022-09-01 20:00:00'),
       ('TomClark', 'tomclark@example.com', 'password10', 0, 'cdef78', '2022-10-01 21:00:00');
