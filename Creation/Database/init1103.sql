CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(50) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS appointments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userId INT(6) UNSIGNED,
appointmentDate DATETIME NOT NULL,
FOREIGN KEY (userId) REFERENCES users(id)
);

INSERT INTO users (username, password, email) VALUES ('john_doe', '$2y$10$M5hhuTPAz7TT9fB0.Yz26OR2TbNSE9G2ugiD10A/A42DAo3vTmNyy', 'john.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', '$2y$10$VARp2S0R7Lz407G4WKLY.D0Bel9nLpGQpQ5tRrgFRpYaCuW4Oe', 'jane.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('mike_jones', '$2y$10$lAgQ0roHUr1Q478Hp3Cwv.lvh3PaGPxE6LyJBi.DLr1F3iTmlauMy', 'mike.jones@example.com');
INSERT INTO users (username, password, email) VALUES ('emily_wang', '$2y$10$meN7pI3lXD1r8l5l0KsXOmcd7.xSjFEXBtM7ISsIoOt3uOzEq1wO', 'emily.wang@example.com');
INSERT INTO users (username, password, email) VALUES ('alex_wilson', '$2y$10$jOwDYkqfPvB0Fn/TQCR.FeBcpZfUUqBU8iVhtzJEVq9kyh7ixmb2', 'alex.wilson@example.com');
INSERT INTO users (username, password, email) VALUES ('sara_brown', '$2y$10$OocQuzZzYfYYZbaPyZV2LuLgcHcpA8Fb448lro.nWP2wKDmi0Mjpq', 'sara.brown@example.com');
INSERT INTO users (username, password, email) VALUES ('david_kim', '$2y$10$A7PZPiXk4WVGiAqf19LlaO.qMKYv9qwVW67zB7DXo1bdQZtd5pDvS', 'david.kim@example.com');
INSERT INTO users (username, password, email) VALUES ('laura_smith', '$2y$10$BZ.KV6lZkQ6oIGBzBz8DKOTKzqwYQ9WdPcxxzHgnY9tbPtnC94el6', 'laura.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('ryan_adams', '$2y$10$.bN0Mcsw0E5VEldQoBYj1Owb9oAUg0LnXG296nYXx0u6dM8FepniO', 'ryan.adams@example.com');
INSERT INTO users (username, password, email) VALUES ('chloe_carter', '$2y$10$keLNvZM0B5rhbQ5PcGPAVecUKbTxSuPCVxVV2qDXpXRS00XgEeoJW', 'chloe.carter@example.com');

INSERT INTO appointments (userId, appointmentDate) VALUES (1, '2022-04-15 10:00:00');
INSERT INTO appointments (userId, appointmentDate) VALUES (2, '2022-04-18 11:30:00');
INSERT INTO appointments (userId, appointmentDate) VALUES (3, '2022-04-20 09:45:00');
INSERT INTO appointments (userId, appointmentDate) VALUES (4, '2022-04-22 14:15:00');
INSERT INTO appointments (userId, appointmentDate) VALUES (5, '2022-04-25 13:00:00');
INSERT INTO appointments (userId, appointmentDate) VALUES (6, '2022-04-30 08:30:00');
INSERT INTO appointments (userId, appointmentDate) VALUES (7, '2022-05-02 16:45:00');
INSERT INTO appointments (userId, appointmentDate) VALUES (8, '2022-05-05 10:30:00');
INSERT INTO appointments (userId, appointmentDate) VALUES (9, '2022-05-08 15:20:00');
INSERT INTO appointments (userId, appointmentDate) VALUES (10, '2022-05-10 09:00:00');
