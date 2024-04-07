CREATE TABLE IF NOT EXISTS volunteers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(30),
    event VARCHAR(100),
    reg_date TIMESTAMP
);

INSERT INTO volunteers (fullname, email, phone, event) VALUES ('John Doe', 'johndoe@example.com', '1234567890', 'Local Charity Event');
INSERT INTO volunteers (fullname, email, phone, event) VALUES ('Jane Smith', 'janesmith@example.com', '9876543210', 'Community Clean-Up');
INSERT INTO volunteers (fullname, email, phone, event) VALUES ('Alice Johnson', 'alicejohnson@example.com', '5556667777', 'Food Drive');
INSERT INTO volunteers (fullname, email, phone, event) VALUES ('Mike Brown', 'mikebrown@example.com', '7778889999', 'Local Charity Event');
INSERT INTO volunteers (fullname, email, phone, event) VALUES ('Sarah Williams', 'sarahwilliams@example.com', '1112223333', 'Community Clean-Up');
INSERT INTO volunteers (fullname, email, phone, event) VALUES ('David Lee', 'davidlee@example.com', '4445556666', 'Food Drive');
INSERT INTO volunteers (fullname, email, phone, event) VALUES ('Emily Davis', 'emilydavis@example.com', '9998887777', 'Local Charity Event');
INSERT INTO volunteers (fullname, email, phone, event) VALUES ('Chris Wilson', 'chriswilson@example.com', '3334445555', 'Community Clean-Up');
INSERT INTO volunteers (fullname, email, phone, event) VALUES ('Amy Moore', 'amymoore@example.com', '6665554444', 'Food Drive');
INSERT INTO volunteers (fullname, email, phone, event) VALUES ('Kevin Anderson', 'kevinanderson@example.com', '2223334444', 'Local Charity Event');
