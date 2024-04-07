CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(255),
loyalty_member BOOLEAN DEFAULT FALSE,
reg_date TIMESTAMP
);

INSERT INTO users (firstname, lastname, email, password, loyalty_member) VALUES ('Alice', 'Smith', 'alice@example.com', '$2y$10$z31JYXw0Wtfpdkq2rYG.wuQWgj.5D7gaJtdHLgW5N/VsC8XTx73My', 1);
INSERT INTO users (firstname, lastname, email, password, loyalty_member) VALUES ('Bob', 'Johnson', 'bob@example.com', '$2y$10$Ra.V6HX9UINJvbKGl9Oyc.viH8YiV1cVZC261AEuYKeggoB/pUdrS', 0);
INSERT INTO users (firstname, lastname, email, password, loyalty_member) VALUES ('Charlie', 'Wilson', 'charlie@example.com', '$2y$10$6T2AzQv1oPwtN4UmOUa2k.wd1Vf4eQRXhAqKkI0MZWTxrAa3XbGK6', 1);
INSERT INTO users (firstname, lastname, email, password, loyalty_member) VALUES ('David', 'Brown', 'david@example.com', '$2y$10$6CQz76JF9VRuI4EFxjXmeuE82PdI29ZsGCRSNvMqNqdwpRJ/KP9sS', 0);
INSERT INTO users (firstname, lastname, email, password, loyalty_member) VALUES ('Emily', 'Davis', 'emily@example.com', '$2y$10$iuGNFmqgS7g3oTKnZMqlMe5MEGY7jffvAYiSOIY708Sck/4TZgWA2', 1);
INSERT INTO users (firstname, lastname, email, password, loyalty_member) VALUES ('Frank', 'Miller', 'frank@example.com', '$2y$10$B1jMgrVJmiuF2Axls5tfCESvTVIjO09.lyPXAN2GSOn2OXJLm0OJ2', 0);
INSERT INTO users (firstname, lastname, email, password, loyalty_member) VALUES ('Grace', 'Lee', 'grace@example.com', '$2y$10$j3z9.4pXNGoeZ1f/4z.rROi4xYCl24dCQaRH9IoIogFpBVs.A4qzm', 1);
INSERT INTO users (firstname, lastname, email, password, loyalty_member) VALUES ('Henry', 'Adams', 'henry@example.com', '$2y$10$BAd6XeEI/y5gdkDS9UXwJe1MGHdkIePl6ZENeRF1fL/O4COxw.pGG', 0);
INSERT INTO users (firstname, lastname, email, password, loyalty_member) VALUES ('Isabel', 'Clark', 'isabel@example.com', '$2y$10$Xi9sCgSc6HRWjvIT8UuQjuygtl/KKuKQ1GhJJNMRr6iJo0wNAnQLm', 1);
INSERT INTO users (firstname, lastname, email, password, loyalty_member) VALUES ('Jack', 'Evans', 'jack@example.com', '$2y$10$C5vpg5LJYopjvN9JmNAh8OEGbdmHfPiR5fb.WMRsSDEVlI8u3HtOq', 0);
