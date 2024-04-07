CREATE TABLE IF NOT EXISTS documents (id INT AUTO_INCREMENT PRIMARY KEY, filename VARCHAR(255), hash VARCHAR(255));

INSERT INTO documents (filename, hash) VALUES ('contract1.pdf', '83a897d18b91d9f0e8a8696588d8e43e2a36f05c33c98f39d7aeb85843212425');
INSERT INTO documents (filename, hash) VALUES ('contract2.docx', '1d78e37c18b1a9f0e8a96b6488d8e43e2a36f05c33c98f39d7aeb85843342429');
INSERT INTO documents (filename, hash) VALUES ('agreement1.pdf', '49e897d18b91d9f0e8a8934588d8e42e2a36f05c33c98f39d7aeb85843212488');
INSERT INTO documents (filename, hash) VALUES ('agreement2.docx', '8d7897c18b91d9f0e8a8696588d8e72e2a36f05c33c98f39d7aeb85843423993');
INSERT INTO documents (filename, hash) VALUES ('lease1.pdf', '23f897d18b91d9f0e8a8696588d8e41e2a36f05c33c98f39d7aeb85843212450');
INSERT INTO documents (filename, hash) VALUES ('lease2.docx', '2e7897c18b31d9f0e8a8696588d8e82e2a36f05c33c98f39d7aeb85843421093');
INSERT INTO documents (filename, hash) VALUES ('report1.pdf', 'c8e897d18b91d9f0e8a2323588d8e42e2a36f05c33c98f39d7aeb85843212445');
INSERT INTO documents (filename, hash) VALUES ('report2.docx', '9b7897c18b91d9f0e8a8696588d8e42e2a36f05c33c98f39d7aeb85843428993');
INSERT INTO documents (filename, hash) VALUES ('invoice1.pdf', 'a2c897d18b91d9f0e8a8696588d8e42e2a36f05c33c98f39d7aeb85843212473');
INSERT INTO documents (filename, hash) VALUES ('invoice2.docx', 'a5f897c18b91d9f0e8a8696588d8e42e2a36f05c33c98f39d7aeb85843422293');
