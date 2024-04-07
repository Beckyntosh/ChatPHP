CREATE TABLE IF NOT EXISTS vector_designs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP
);

INSERT INTO vector_designs (filename) VALUES ('example_logo.svg');
INSERT INTO vector_designs (filename) VALUES ('client_design.eps');
INSERT INTO vector_designs (filename) VALUES ('company_branding.svg');
INSERT INTO vector_designs (filename) VALUES ('product_packaging.eps');
INSERT INTO vector_designs (filename) VALUES ('custom_design_1.svg');
INSERT INTO vector_designs (filename) VALUES ('custom_design_2.eps');
INSERT INTO vector_designs (filename) VALUES ('client_logo_1.svg');
INSERT INTO vector_designs (filename) VALUES ('client_logo_2.eps');
INSERT INTO vector_designs (filename) VALUES ('brand_identity.svg');
INSERT INTO vector_designs (filename) VALUES ('packaging_design.eps');
