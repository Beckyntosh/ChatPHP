CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    google_id VARCHAR(30) NOT NULL,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

-- Insert sample data into users table
INSERT INTO users (google_id, first_name, last_name, email) VALUES ('123456', 'Alice', 'Smith', 'alice@gmail.com');
INSERT INTO users (google_id, first_name, last_name, email) VALUES ('789012', 'Bob', 'Johnson', 'bob@yahoo.com');
INSERT INTO users (google_id, first_name, last_name, email) VALUES ('345678', 'Charlie', 'Brown', 'charlie@hotmail.com');
INSERT INTO users (google_id, first_name, last_name, email) VALUES ('901234', 'Diana', 'Davis', 'diana@example.com');
INSERT INTO users (google_id, first_name, last_name, email) VALUES ('567890', 'Eve', 'Wilson', 'eve@gmail.com');
INSERT INTO users (google_id, first_name, last_name, email) VALUES ('234567', 'Frank', 'Lee', 'frank@yahoo.com');
INSERT INTO users (google_id, first_name, last_name, email) VALUES ('890123', 'Grace', 'Adams', 'grace@hotmail.com');
INSERT INTO users (google_id, first_name, last_name, email) VALUES ('456789', 'Henry', 'Smith', 'henry@example.com');
INSERT INTO users (google_id, first_name, last_name, email) VALUES ('012345', 'Ivy', 'Clark', 'ivy@gmail.com');
INSERT INTO users (google_id, first_name, last_name, email) VALUES ('678901', 'Jack', 'Taylor', 'jack@yahoo.com');
