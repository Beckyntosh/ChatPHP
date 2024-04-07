CREATE TABLE IF NOT EXISTS contacts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(20),
    reg_date TIMESTAMP
);

INSERT INTO contacts (name, email, phone) VALUES ('John Doe', 'john.doe@example.com', '1234567890');
INSERT INTO contacts (name, email, phone) VALUES ('Jane Smith', 'jane.smith@example.com', '9876543210');
INSERT INTO contacts (name, email, phone) VALUES ('Alice Johnson', 'alice.johnson@example.com', '5554443333');
INSERT INTO contacts (name, email, phone) VALUES ('Bob Brown', 'bob.brown@example.com', '7654321098');
INSERT INTO contacts (name, email, phone) VALUES ('Eva Williams', 'eva.williams@example.com', '1122334455');
INSERT INTO contacts (name, email, phone) VALUES ('Michael Lee', 'michael.lee@example.com', '9876543210');
INSERT INTO contacts (name, email, phone) VALUES ('Sarah Davis', 'sarah.davis@example.com', '5432157890');
INSERT INTO contacts (name, email, phone) VALUES ('Alex Garcia', 'alex.garcia@example.com', '8765432190');
INSERT INTO contacts (name, email, phone) VALUES ('Emily Rodriguez', 'emily.rodriguez@example.com', '6543210987');
INSERT INTO contacts (name, email, phone) VALUES ('William Martinez', 'william.martinez@example.com', '3210987654');
