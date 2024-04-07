CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(255) NOT NULL,
    contact_name VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL
);

INSERT INTO customers (customer_name, contact_name, country) VALUES ('John Doe', 'Jane Doe', 'USA');
INSERT INTO customers (customer_name, contact_name, country) VALUES ('Alice Smith', 'Bob Smith', 'Canada');
INSERT INTO customers (customer_name, contact_name, country) VALUES ('Elena Gonzalez', 'Juan Gonzalez', 'Mexico');
INSERT INTO customers (customer_name, contact_name, country) VALUES ('Sophie Dubois', 'Pierre Dubois', 'France');
INSERT INTO customers (customer_name, contact_name, country) VALUES ('Liu Wei', 'Zhang Wei', 'China');
INSERT INTO customers (customer_name, contact_name, country) VALUES ('Maria Silva', 'Pedro Silva', 'Brazil');
INSERT INTO customers (customer_name, contact_name, country) VALUES ('Hans Müller', 'Heidi Müller', 'Germany');
INSERT INTO customers (customer_name, contact_name, country) VALUES ('Chihiro Yamada', 'Kenji Yamada', 'Japan');
INSERT INTO customers (customer_name, contact_name, country) VALUES ('Anita Kaur', 'Raj Kaur', 'India');
INSERT INTO customers (customer_name, contact_name, country) VALUES ('Ali Khan', 'Fatima Khan', 'Pakistan');
