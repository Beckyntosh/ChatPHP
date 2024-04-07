CREATE TABLE IF NOT EXISTS newsletters (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) NOT NULL,
  token VARCHAR(255) NOT NULL,
  is_confirmed BOOLEAN NOT NULL DEFAULT FALSE,
  sign_up_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO newsletters (email, token, is_confirmed) VALUES ('example1@gmail.com', 'abc123', TRUE);
INSERT INTO newsletters (email, token, is_confirmed) VALUES ('example2@gmail.com', 'def456', FALSE);
INSERT INTO newsletters (email, token, is_confirmed) VALUES ('example3@gmail.com', 'ghi789', TRUE);
INSERT INTO newsletters (email, token, is_confirmed) VALUES ('example4@gmail.com', 'jkl012', FALSE);
INSERT INTO newsletters (email, token, is_confirmed) VALUES ('example5@gmail.com', 'mno345', TRUE);
INSERT INTO newsletters (email, token, is_confirmed) VALUES ('example6@gmail.com', 'pqr678', FALSE);
INSERT INTO newsletters (email, token, is_confirmed) VALUES ('example7@gmail.com', 'stu901', TRUE);
INSERT INTO newsletters (email, token, is_confirmed) VALUES ('example8@gmail.com', 'vwx234', FALSE);
INSERT INTO newsletters (email, token, is_confirmed) VALUES ('example9@gmail.com', 'yz678', TRUE);
INSERT INTO newsletters (email, token, is_confirmed) VALUES ('example10@gmail.com', 'abc098', FALSE);