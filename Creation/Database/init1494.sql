CREATE TABLE IF NOT EXISTS clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    contact_details TEXT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO clients (name, contact_details) VALUES ('Acme Corp', '123 Main St, Acme Corp, email@example.com');
INSERT INTO clients (name, contact_details) VALUES ('XYZ Company', '456 Center St, XYZ Company, xyz@email.com');
INSERT INTO clients (name, contact_details) VALUES ('ABC Inc', '789 First Ave, ABC Inc, abc@example.com');
INSERT INTO clients (name, contact_details) VALUES ('EFG Ltd', '876 Top Rd, EFG Ltd, efg@email.com');
INSERT INTO clients (name, contact_details) VALUES ('LMN Corporation', '543 Sky Blvd, LMN Corporation, lmn@example.com');
INSERT INTO clients (name, contact_details) VALUES ('PQR Enterprises', '432 Ocean Ave, PQR Enterprises, pqr@email.com');
INSERT INTO clients (name, contact_details) VALUES ('UVW Co.', '987 Front St, UVW Co., uvw@example.com');
INSERT INTO clients (name, contact_details) VALUES ('STU Limited', '654 Back Rd, STU Limited, stu@example.com');
INSERT INTO clients (name, contact_details) VALUES ('RST Group', '321 Left St, RST Group, rst@example.com');
INSERT INTO clients (name, contact_details) VALUES ('MNO Industries', '789 Right Rd, MNO Industries, mno@example.com');
