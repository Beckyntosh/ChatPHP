CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, name, email, password) VALUES ('john_doe', 'John Doe', 'john.doe@example.com', '$2y$10$QGK3khCmBrD2YsDDBEOYYuNbuildlDnlOkBttCKJA0FjVgaU69sZy');
INSERT INTO users (username, name, email, password) VALUES ('jane_smith', 'Jane Smith', 'jane.smith@example.com', '$2y$10$Tk/IuAM5n3FzX.my8YaYA.r2Kj7oQhPSXyEMOu6HkAqUBTVTknJ9i');
INSERT INTO users (username, name, email, password) VALUES ('sam_wilson', 'Sam Wilson', 'sam.wilson@example.com', '$2y$10$MwzTf9RXGPQugwtDDSHuuuNX.blMaSjEEneiJUahRTS4CNXvxTx0K');
INSERT INTO users (username, name, email, password) VALUES ('lisa_brown', 'Lisa Brown', 'lisa.brown@example.com', '$2y$10$Yi9RZ.Ls9.0tT7w/6m3szePcJDN2zOlPcqYcZ/xhJs6ErZXCx8ZPe');
INSERT INTO users (username, name, email, password) VALUES ('michael_clark', 'Michael Clark', 'michael.clark@example.com', '$2y$10$GQ5.hhPLLeqvAFoddjibeuboh1YpK23cWiuxBl9y36mjyZnspEX0O');
INSERT INTO users (username, name, email, password) VALUES ('sarah_harrison', 'Sarah Harrison', 'sarah.harrison@example.com', '$2y$10$3IKFBW9IvYYCH3JHZ7WnOK9NKvysq6Jsqy4dR3EXtQMbNAkzEM3gW');
INSERT INTO users (username, name, email, password) VALUES ('peter_jones', 'Peter Jones', 'peter.jones@example.com', '$2y$10$ye9C3HFG6RyS57OI5Agjx.IrRFqU.b5wKMdK3AWtHXOQt2H70pdLe');
INSERT INTO users (username, name, email, password) VALUES ('amy_smith', 'Amy Smith', 'amy.smith@example.com', '$2y$10$C9jpol2/GavPyc.e47i/.Om5pgrundwHjqq2D0CIMArBiEitOi/L.e');
INSERT INTO users (username, name, email, password) VALUES ('matt_davis', 'Matt Davis', 'matt.davis@example.com', '$2y$10$Q1wAGTv6GK8nIKYmFsxZouAQ/fDWOa1JkIH3XLHeFydzZ6coFj.v6');
INSERT INTO users (username, name, email, password) VALUES ('katie_lawrence', 'Katie Lawrence', 'katie.lawrence@example.com', '$2y$10$I2OnY0TzVqxVj0Jmt9VQUOQjpHmCQC11k1qA4YYYLKP0cPWRT535G');
