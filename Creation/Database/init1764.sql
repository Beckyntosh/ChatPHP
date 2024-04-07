CREATE TABLE IF NOT EXISTS scanned_documents (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    document_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO scanned_documents (user_id, document_name, file_path) VALUES (1, 'Driver\'s License', 'uploads/driver_license_1.pdf');
INSERT INTO scanned_documents (user_id, document_name, file_path) VALUES (1, 'Passport', 'uploads/passport_1.pdf');
INSERT INTO scanned_documents (user_id, document_name, file_path) VALUES (1, 'ID Card', 'uploads/id_card_1.pdf');
INSERT INTO scanned_documents (user_id, document_name, file_path) VALUES (1, 'Utility Bill', 'uploads/utility_bill_1.pdf');
INSERT INTO scanned_documents (user_id, document_name, file_path) VALUES (2, 'Driver\'s License', 'uploads/driver_license_2.pdf');
INSERT INTO scanned_documents (user_id, document_name, file_path) VALUES (2, 'Passport', 'uploads/passport_2.pdf');
INSERT INTO scanned_documents (user_id, document_name, file_path) VALUES (2, 'ID Card', 'uploads/id_card_2.pdf');
INSERT INTO scanned_documents (user_id, document_name, file_path) VALUES (2, 'Utility Bill', 'uploads/utility_bill_2.pdf');
INSERT INTO scanned_documents (user_id, document_name, file_path) VALUES (3, 'Driver\'s License', 'uploads/driver_license_3.pdf');
INSERT INTO scanned_documents (user_id, document_name, file_path) VALUES (3, 'Passport', 'uploads/passport_3.pdf');
