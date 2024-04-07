CREATE TABLE IF NOT EXISTS contacts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(20),
    reg_date TIMESTAMP
);

INSERT INTO contacts (name, email, phone) VALUES ('John Doe', 'john.doe@example.com', '1234567890');
INSERT INTO contacts (name, email, phone) VALUES ('Jane Smith', 'jane.smith@example.com', '9876543210');
INSERT INTO contacts (name, email, phone) VALUES ('Michael Johnson', 'michael.johnson@example.com', '4561237890');
INSERT INTO contacts (name, email, phone) VALUES ('Emily Brown', 'emily.brown@example.com', '7894561230');
INSERT INTO contacts (name, email, phone) VALUES ('David Miller', 'david.miller@example.com', '1472583690');
INSERT INTO contacts (name, email, phone) VALUES ('Sarah Wilson', 'sarah.wilson@example.com', '3692581470');
INSERT INTO contacts (name, email, phone) VALUES ('Mark Taylor', 'mark.taylor@example.com', '2583691470');
INSERT INTO contacts (name, email, phone) VALUES ('Laura Clark', 'laura.clark@example.com', '3216549870');
INSERT INTO contacts (name, email, phone) VALUES ('Kevin Lee', 'kevin.lee@example.com', '6549873210');
INSERT INTO contacts (name, email, phone) VALUES ('Amanda Davis', 'amanda.davis@example.com', '1592648370');
