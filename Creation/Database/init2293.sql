CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  password VARCHAR(50),
  verification_code VARCHAR(50),
  verified TINYINT(1) NOT NULL DEFAULT 0,
  reg_date TIMESTAMP
);

INSERT INTO users (username, email, password, verification_code) VALUES ('john_doe', 'john.doe@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '12345');
INSERT INTO users (username, email, password, verification_code) VALUES ('jane_smith', 'jane.smith@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '54321');
INSERT INTO users (username, email, password, verification_code) VALUES ('sam_wilson', 'sam.wilson@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '98765');
INSERT INTO users (username, email, password, verification_code) VALUES ('alice_jones', 'alice.jones@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '45678');
INSERT INTO users (username, email, password, verification_code) VALUES ('greg_adams', 'greg.adams@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '54321');
INSERT INTO users (username, email, password, verification_code) VALUES ('linda_moore', 'linda.moore@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '65432');
INSERT INTO users (username, email, password, verification_code) VALUES ('michael_brown', 'michael.brown@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '23145');
INSERT INTO users (username, email, password, verification_code) VALUES ('sara_ramirez', 'sara.ramirez@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '87654');
INSERT INTO users (username, email, password, verification_code) VALUES ('kevin_garcia', 'kevin.garcia@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '76543');
INSERT INTO users (username, email, password, verification_code) VALUES ('rebecca_smith', 'rebecca.smith@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', '56789');
