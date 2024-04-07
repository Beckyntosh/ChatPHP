CREATE TABLE IF NOT EXISTS property_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    property_id INT(6) UNSIGNED,
    user_name VARCHAR(30) NOT NULL,
    rating INT(1),
    review TEXT,
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS properties (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    description TEXT,
    reg_date TIMESTAMP
);

INSERT INTO properties (name, description, reg_date) VALUES ('Property A', 'Description A', NOW());
INSERT INTO properties (name, description, reg_date) VALUES ('Property B', 'Description B', NOW());
INSERT INTO properties (name, description, reg_date) VALUES ('Property C', 'Description C', NOW());
INSERT INTO properties (name, description, reg_date) VALUES ('Property D', 'Description D', NOW());
INSERT INTO properties (name, description, reg_date) VALUES ('Property E', 'Description E', NOW());
INSERT INTO properties (name, description, reg_date) VALUES ('Property F', 'Description F', NOW());
INSERT INTO properties (name, description, reg_date) VALUES ('Property G', 'Description G', NOW());
INSERT INTO properties (name, description, reg_date) VALUES ('Property H', 'Description H', NOW());
INSERT INTO properties (name, description, reg_date) VALUES ('Property I', 'Description I', NOW());
INSERT INTO properties (name, description, reg_date) VALUES ('Property J', 'Description J', NOW());