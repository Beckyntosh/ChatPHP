CREATE TABLE IF NOT EXISTS clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
contact_number VARCHAR(15),
register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS interaction_logs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
client_id INT(6) UNSIGNED,
interaction_detail TEXT,
interaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (client_id) REFERENCES clients(id)
);

INSERT INTO clients (name, email, contact_number) VALUES ('John Doe', 'johndoe@example.com', '1234567890');
INSERT INTO clients (name, email, contact_number) VALUES ('Jane Smith', 'janesmith@example.com', '9876543210');
INSERT INTO clients (name, email, contact_number) VALUES ('Michael Johnson', 'michaeljohnson@example.com', '4561237890');
INSERT INTO clients (name, email, contact_number) VALUES ('Emily Davis', 'emilydavis@example.com', '7896541230');
INSERT INTO clients (name, email, contact_number) VALUES ('David Brown', 'davidbrown@example.com', '3214569870');
INSERT INTO clients (name, email, contact_number) VALUES ('Linda Wilson', 'lindawilson@example.com', '6547891230');
INSERT INTO clients (name, email, contact_number) VALUES ('Robert Miller', 'robertmiller@example.com', '9874563210');
INSERT INTO clients (name, email, contact_number) VALUES ('Laura Martinez', 'lauramartinez@example.com', '7891236540');
INSERT INTO clients (name, email, contact_number) VALUES ('Christopher Lee', 'christopherlee@example.com', '4567893210');
INSERT INTO clients (name, email, contact_number) VALUES ('Amanda White', 'amandawhite@example.com', '1236549870');