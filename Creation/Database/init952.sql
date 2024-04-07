CREATE TABLE IF NOT EXISTS password_resets (
 id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 email VARCHAR(255) NOT NULL,
 token VARCHAR(255) NOT NULL,
 created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
 INDEX email_index (email)
);

INSERT INTO password_resets (email, token) VALUES ('user1@example.com', 'a1b2c3d4e5');
INSERT INTO password_resets (email, token) VALUES ('user2@example.com', 'f6g7h8i9j0');
INSERT INTO password_resets (email, token) VALUES ('user3@example.com', 'k1l2m3n4o5');
INSERT INTO password_resets (email, token) VALUES ('user4@example.com', 'p6q7r8s9t0');
INSERT INTO password_resets (email, token) VALUES ('user5@example.com', 'u1v2w3x4y5');
INSERT INTO password_resets (email, token) VALUES ('user6@example.com', 'z6a7b8c9d0');
INSERT INTO password_resets (email, token) VALUES ('user7@example.com', 'e1f2g3h4i5');
INSERT INTO password_resets (email, token) VALUES ('user8@example.com', 'j6k7l8m9n0');
INSERT INTO password_resets (email, token) VALUES ('user9@example.com', 'o1p2q3r4s5');
INSERT INTO password_resets (email, token) VALUES ('user10@example.com', 't6u7v8w9x0');
