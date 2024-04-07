CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL
);

INSERT INTO users (username, password, name) VALUES ('john_doe', 'password123', 'John Doe');
INSERT INTO users (username, password, name) VALUES ('jane_smith', 'securepass', 'Jane Smith');
INSERT INTO users (username, password, name) VALUES ('alex123', 'userpass', 'Alex Johnson');
INSERT INTO users (username, password, name) VALUES ('emily87', 'letmein', 'Emily Davis');
INSERT INTO users (username, password, name) VALUES ('mike_t', 'mikemike', 'Mike Thompson');
INSERT INTO users (username, password, name) VALUES ('sara22', 'password321', 'Sara Brown');
INSERT INTO users (username, password, name) VALUES ('samc07', 'samsam', 'Sam Clark');
INSERT INTO users (username, password, name) VALUES ('laura_m', 'laurapass', 'Laura Martinez');
INSERT INTO users (username, password, name) VALUES ('adam12', 'secure123', 'Adam Williams');
INSERT INTO users (username, password, name) VALUES ('katie34', 'passkatie', 'Katie White');
