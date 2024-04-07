CREATE TABLE IF NOT EXISTS clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(30) NOT NULL,
    lastName VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(15),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS interaction_logs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    clientId INT(6) UNSIGNED,
    interaction VARCHAR(255) NOT NULL,
    interactionDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (clientId) REFERENCES clients(id)
);

INSERT INTO clients (firstName, lastName, email, phone) VALUES ('John', 'Doe', 'john.doe@example.com', '555-1234');
INSERT INTO clients (firstName, lastName, email, phone) VALUES ('Jane', 'Smith', 'jane.smith@example.com', '555-5678');
INSERT INTO clients (firstName, lastName, email, phone) VALUES ('Alice', 'Johnson', 'alice.johnson@example.com', '555-9090');
INSERT INTO clients (firstName, lastName, email, phone) VALUES ('Bob', 'Brown', 'bob.brown@example.com', '555-4321');
INSERT INTO clients (firstName, lastName, email, phone) VALUES ('Mary', 'Davis', 'mary.davis@example.com', '555-8765');
INSERT INTO clients (firstName, lastName, email, phone) VALUES ('Alex', 'Martinez', 'alex.martinez@example.com', '555-1357');
INSERT INTO clients (firstName, lastName, email, phone) VALUES ('Sarah', 'Garcia', 'sarah.garcia@example.com', '555-3579');
INSERT INTO clients (firstName, lastName, email, phone) VALUES ('Mike', 'Rodriguez', 'mike.rodriguez@example.com', '555-7913');
INSERT INTO clients (firstName, lastName, email, phone) VALUES ('Emily', 'Lopez', 'emily.lopez@example.com', '555-2468');
INSERT INTO clients (firstName, lastName, email, phone) VALUES ('Chris', 'Perez', 'chris.perez@example.com', '555-6802');