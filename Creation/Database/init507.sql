CREATE TABLE IF NOT EXISTS encrypted_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO encrypted_files (filename) VALUES ('uploads/1samplefile.txt');
INSERT INTO encrypted_files (filename) VALUES ('uploads/2examplefile.doc');
INSERT INTO encrypted_files (filename) VALUES ('uploads/3testfile.pdf');
INSERT INTO encrypted_files (filename) VALUES ('uploads/4important.docx');
INSERT INTO encrypted_files (filename) VALUES ('uploads/5researchdata.csv');
INSERT INTO encrypted_files (filename) VALUES ('uploads/6presentation.pptx');
INSERT INTO encrypted_files (filename) VALUES ('uploads/7image.png');
INSERT INTO encrypted_files (filename) VALUES ('uploads/8codefile.py');
INSERT INTO encrypted_files (filename) VALUES ('uploads/9document.doc');
INSERT INTO encrypted_files (filename) VALUES ('uploads/10datafile.xlsx');