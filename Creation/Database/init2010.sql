CREATE TABLE IF NOT EXISTS vector_designs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO vector_designs (filename) VALUES ('design1.svg');
INSERT INTO vector_designs (filename) VALUES ('design2.svg');
INSERT INTO vector_designs (filename) VALUES ('design3.svg');
INSERT INTO vector_designs (filename) VALUES ('design4.svg');
INSERT INTO vector_designs (filename) VALUES ('design5.svg');
INSERT INTO vector_designs (filename) VALUES ('design6.svg');
INSERT INTO vector_designs (filename) VALUES ('design7.svg');
INSERT INTO vector_designs (filename) VALUES ('design8.svg');
INSERT INTO vector_designs (filename) VALUES ('design9.svg');
INSERT INTO vector_designs (filename) VALUES ('design10.svg');
