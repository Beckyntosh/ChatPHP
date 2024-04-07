CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description TEXT,
    brand VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO products (name, description, brand) VALUES ('Product1', 'Description1', 'Brand1');
INSERT INTO products (name, description, brand) VALUES ('Product2', 'Description2', 'Brand2');
INSERT INTO products (name, description, brand) VALUES ('Product3', 'Description3', 'Brand3');
INSERT INTO products (name, description, brand) VALUES ('Product4', 'Description4', 'Brand4');
INSERT INTO products (name, description, brand) VALUES ('Product5', 'Description5', 'Brand5');
INSERT INTO products (name, description, brand) VALUES ('Product6', 'Description6', 'Brand6');
INSERT INTO products (name, description, brand) VALUES ('Product7', 'Description7', 'Brand7');
INSERT INTO products (name, description, brand) VALUES ('Product8', 'Description8', 'Brand8');
INSERT INTO products (name, description, brand) VALUES ('Product9', 'Description9', 'Brand9');
INSERT INTO products (name, description, brand) VALUES ('Product10', 'Description10', 'Brand10');