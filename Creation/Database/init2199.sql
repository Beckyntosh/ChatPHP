CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (fullname, email) VALUES ('John Doe', 'john.doe@example.com');
INSERT INTO users (fullname, email) VALUES ('Jane Smith', 'jane.smith@example.com');
INSERT INTO users (fullname, email) VALUES ('Alice Johnson', 'alice.johnson@example.com');
INSERT INTO users (fullname, email) VALUES ('Bob Williams', 'bob.williams@example.com');
INSERT INTO users (fullname, email) VALUES ('Mary Brown', 'mary.brown@example.com');
INSERT INTO users (fullname, email) VALUES ('Chris Davis', 'chris.davis@example.com');
INSERT INTO users (fullname, email) VALUES ('Kim Garcia', 'kim.garcia@example.com');
INSERT INTO users (fullname, email) VALUES ('Tom Wilson', 'tom.wilson@example.com');
INSERT INTO users (fullname, email) VALUES ('Laura Martinez', 'laura.martinez@example.com');
INSERT INTO users (fullname, email) VALUES ('Sam Taylor', 'sam.taylor@example.com');
