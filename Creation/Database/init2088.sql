CREATE TABLE IF NOT EXISTS uploaded_documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploaded_documents (filename) VALUES ('Driver_License.pdf');
INSERT INTO uploaded_documents (filename) VALUES ('Passport.pdf');
INSERT INTO uploaded_documents (filename) VALUES ('Student_ID.jpg');
INSERT INTO uploaded_documents (filename) VALUES ('Utility_Bill.pdf');
INSERT INTO uploaded_documents (filename) VALUES ('Bank_Statement.pdf');
INSERT INTO uploaded_documents (filename) VALUES ('Insurance_Document.pdf');
INSERT INTO uploaded_documents (filename) VALUES ('Residence_Permit.pdf');
INSERT INTO uploaded_documents (filename) VALUES ('Vehicle_Registration.pdf');
INSERT INTO uploaded_documents (filename) VALUES ('Medical_Record.pdf');
INSERT INTO uploaded_documents (filename) VALUES ('Birth_Certificate.pdf');