CREATE TABLE IF NOT EXISTS product_updates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO product_updates (email) VALUES ('john.doe@example.com');
INSERT INTO product_updates (email) VALUES ('jane.smith@example.com');
INSERT INTO product_updates (email) VALUES ('test.email@example.com');
INSERT INTO product_updates (email) VALUES ('example.email@example.com');
INSERT INTO product_updates (email) VALUES ('user123@example.com');
INSERT INTO product_updates (email) VALUES ('productupdates@example.com');
INSERT INTO product_updates (email) VALUES ('healthwellness@example.com');
INSERT INTO product_updates (email) VALUES ('wellness123@example.com');
INSERT INTO product_updates (email) VALUES ('signup@example.com');
INSERT INTO product_updates (email) VALUES ('notifyme@example.com');
