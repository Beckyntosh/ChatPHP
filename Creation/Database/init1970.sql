CREATE TABLE IF NOT EXISTS print_orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    printed BOOLEAN DEFAULT 0,
    reg_date TIMESTAMP
);

INSERT INTO print_orders (file_name) VALUES ('Wedding Invitation Design 1');
INSERT INTO print_orders (file_name) VALUES ('Wedding Invitation Design 2');
INSERT INTO print_orders (file_name) VALUES ('Wedding Invitation Design 3');
INSERT INTO print_orders (file_name) VALUES ('Wedding Invitation Design 4');
INSERT INTO print_orders (file_name) VALUES ('Wedding Invitation Design 5');
INSERT INTO print_orders (file_name) VALUES ('Wedding Invitation Design 6');
INSERT INTO print_orders (file_name) VALUES ('Wedding Invitation Design 7');
INSERT INTO print_orders (file_name) VALUES ('Wedding Invitation Design 8');
INSERT INTO print_orders (file_name) VALUES ('Wedding Invitation Design 9');
INSERT INTO print_orders (file_name) VALUES ('Wedding Invitation Design 10');
