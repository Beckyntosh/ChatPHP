CREATE TABLE IF NOT EXISTS Products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Comparison (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productIds VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Products (name, description, price) VALUES ('Product A', 'Description A', 100.00);
INSERT INTO Products (name, description, price) VALUES ('Product B', 'Description B', 150.00);
INSERT INTO Products (name, description, price) VALUES ('Product C', 'Description C', 200.00);
INSERT INTO Products (name, description, price) VALUES ('Product D', 'Description D', 120.00);
INSERT INTO Products (name, description, price) VALUES ('Product E', 'Description E', 180.00);
INSERT INTO Products (name, description, price) VALUES ('Product F', 'Description F', 250.00);
INSERT INTO Products (name, description, price) VALUES ('Product G', 'Description G', 300.00);
INSERT INTO Products (name, description, price) VALUES ('Product H', 'Description H', 80.00);
INSERT INTO Products (name, description, price) VALUES ('Product I', 'Description I', 160.00);
INSERT INTO Products (name, description, price) VALUES ('Product J', 'Description J', 220.00);

INSERT INTO Comparison (productIds) VALUES ('1,2,3');
INSERT INTO Comparison (productIds) VALUES ('4,5,6');
INSERT INTO Comparison (productIds) VALUES ('7,8,9');
