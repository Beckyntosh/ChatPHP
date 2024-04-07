CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (firstname, lastname, email) VALUES ('John', 'Doe', 'johndoe@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Alice', 'Smith', 'alice.smith@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Bob', 'Johnson', 'bob.j@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Emily', 'Brown', 'emily.b@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Michael', 'Davis', 'm.davis@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Sarah', 'Wilson', 'sarah.w@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Tom', 'Anderson', 'tom.a@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Jennifer', 'Lee', 'jenniferl@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('David', 'Martinez', 'd.martinez@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Jessica', 'Taylor', 'jessica.t@example.com');
