CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Insert sample data into users table
INSERT INTO users (name, email) VALUES ('John Doe', 'john.doe@example.com');
INSERT INTO users (name, email) VALUES ('Jane Smith', 'jane.smith@example.com');
INSERT INTO users (name, email) VALUES ('Alice Brown', 'alice.brown@example.com');
INSERT INTO users (name, email) VALUES ('Bob Johnson', 'bob.johnson@example.com');
INSERT INTO users (name, email) VALUES ('Emma White', 'emma.white@example.com');
INSERT INTO users (name, email) VALUES ('Michael Lee', 'michael.lee@example.com');
INSERT INTO users (name, email) VALUES ('Sarah Davis', 'sarah.davis@example.com');
INSERT INTO users (name, email) VALUES ('James Wilson', 'james.wilson@example.com');
INSERT INTO users (name, email) VALUES ('Olivia Clark', 'olivia.clark@example.com');
INSERT INTO users (name, email) VALUES ('William Moore', 'william.moore@example.com');
