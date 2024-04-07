CREATE TABLE IF NOT EXISTS vector_uploads (
          id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          filename VARCHAR(255) NOT NULL,
          uploaded_on DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO vector_uploads (filename) VALUES ('uploads/logo1.svg');
INSERT INTO vector_uploads (filename) VALUES ('uploads/logo2.eps');
INSERT INTO vector_uploads (filename) VALUES ('uploads/logo3.svg');
INSERT INTO vector_uploads (filename) VALUES ('uploads/logo4.eps');
INSERT INTO vector_uploads (filename) VALUES ('uploads/logo5.svg');
INSERT INTO vector_uploads (filename) VALUES ('uploads/logo6.eps');
INSERT INTO vector_uploads (filename) VALUES ('uploads/logo7.svg');
INSERT INTO vector_uploads (filename) VALUES ('uploads/logo8.eps');
INSERT INTO vector_uploads (filename) VALUES ('uploads/logo9.svg');
INSERT INTO vector_uploads (filename) VALUES ('uploads/logo10.eps');
