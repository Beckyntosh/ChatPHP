CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) UNIQUE,
    password VARCHAR(255)
);

INSERT INTO admin (username, password) VALUES ('admin', 'admin_password');
INSERT INTO admin (username, password) VALUES ('john_doe', 'john_password');
INSERT INTO admin (username, password) VALUES ('jane_smith', 'jane_password');
INSERT INTO admin (username, password) VALUES ('alice_miller', 'alice_password');
INSERT INTO admin (username, password) VALUES ('bob_jones', 'bob_password');
INSERT INTO admin (username, password) VALUES ('sarah_white', 'sarah_password');
INSERT INTO admin (username, password) VALUES ('mark_thomas', 'mark_password');
INSERT INTO admin (username, password) VALUES ('emily_green', 'emily_password');
INSERT INTO admin (username, password) VALUES ('michael_brown', 'michael_password');
INSERT INTO admin (username, password) VALUES ('laura_wilson', 'laura_password');
