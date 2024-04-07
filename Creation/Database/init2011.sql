CREATE TABLE IF NOT EXISTS vector_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO vector_files (filename) VALUES ('uploads/company_logo.svg');
INSERT INTO vector_files (filename) VALUES ('uploads/logo_design.ai');
INSERT INTO vector_files (filename) VALUES ('uploads/vector_image.eps');
INSERT INTO vector_files (filename) VALUES ('uploads/branding_logo.svg');
INSERT INTO vector_files (filename) VALUES ('uploads/pet_logo.ai');
INSERT INTO vector_files (filename) VALUES ('uploads/vector_art.eps');
INSERT INTO vector_files (filename) VALUES ('uploads/company_branding.svg');
INSERT INTO vector_files (filename) VALUES ('uploads/vector_pattern.ai');
INSERT INTO vector_files (filename) VALUES ('uploads/design_elements.eps');
INSERT INTO vector_files (filename) VALUES ('uploads/vector_graphics.svg');