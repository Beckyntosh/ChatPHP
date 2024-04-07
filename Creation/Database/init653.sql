CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (name, email, password) VALUES ('John Doe', 'johndoe@example.com', 'password123');
INSERT INTO users (name, email, password) VALUES ('Jane Smith', 'janesmith@example.com', 'securepwd');
INSERT INTO users (name, email, password) VALUES ('Alice Johnson', 'alicej@example.com', 'pass123456');
INSERT INTO users (name, email, password) VALUES ('Bob Brown', 'bobbrown@example.com', 'brownbobpwd');
INSERT INTO users (name, email, password) VALUES ('Sarah Lee', 'sarahlee@example.com', 'sarahpwd1');
INSERT INTO users (name, email, password) VALUES ('Michael Ward', 'michaelw@example.com', 'wardpass321');
INSERT INTO users (name, email, password) VALUES ('Laura White', 'lauraw@example.com', 'laurapwd678');
INSERT INTO users (name, email, password) VALUES ('Kevin Davis', 'kevind@example.com', 'davispwd44');
INSERT INTO users (name, email, password) VALUES ('Emily Taylor', 'emilyt@example.com', 'taylorepwd987');
INSERT INTO users (name, email, password) VALUES ('Chris Roberts', 'chrisr@example.com', 'chrispass555');
