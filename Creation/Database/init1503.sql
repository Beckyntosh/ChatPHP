CREATE TABLE IF NOT EXISTS clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    contact_details TEXT NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO clients (name, contact_details) VALUES ('Acme Corp', '123 Main Street, New York, NY, 10001, email@example.com');
INSERT INTO clients (name, contact_details) VALUES ('XYZ Corp', '456 Elm Street, Los Angeles, CA, 90001, xyz@example.com');
INSERT INTO clients (name, contact_details) VALUES ('ABC Inc', '789 Oak Street, Chicago, IL, 60001, abc@example.com');
INSERT INTO clients (name, contact_details) VALUES ('PQR Ltd', '432 Pine Street, San Francisco, CA, 94016, pqr@example.com');
INSERT INTO clients (name, contact_details) VALUES ('LMN Co', '876 Maple Street, Boston, MA, 02101, lmn@example.com');
INSERT INTO clients (name, contact_details) VALUES ('JKL Enterprises', '987 Birch Street, Houston, TX, 77002, jkl@example.com');
INSERT INTO clients (name, contact_details) VALUES ('RST Corporation', '543 Cedar Street, Miami, FL, 33125, rst@example.com');
INSERT INTO clients (name, contact_details) VALUES ('UVW Industries', '678 Walnut Street, Seattle, WA, 98101, uvw@example.com');
INSERT INTO clients (name, contact_details) VALUES ('EFG Group', '765 Sycamore Street, Denver, CO, 80202, efg@example.com');
INSERT INTO clients (name, contact_details) VALUES ('HIJ Ltd', '234 Spruce Street, Dallas, TX, 75201, hij@example.com');
