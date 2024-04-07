CREATE TABLE IF NOT EXISTS designs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO designs (filename) VALUES ('company_logo1.ai');
INSERT INTO designs (filename) VALUES ('company_logo2.eps');
INSERT INTO designs (filename) VALUES ('company_logo3.svg');
INSERT INTO designs (filename) VALUES ('company_logo4.pdf');
INSERT INTO designs (filename) VALUES ('organic1.ai');
INSERT INTO designs (filename) VALUES ('organic2.eps');
INSERT INTO designs (filename) VALUES ('organic3.svg');
INSERT INTO designs (filename) VALUES ('organic4.pdf');
INSERT INTO designs (filename) VALUES ('knuth1.ai');
INSERT INTO designs (filename) VALUES ('knuth2.eps');
