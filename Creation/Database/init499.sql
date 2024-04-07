CREATE TABLE IF NOT EXISTS UserEmails (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    encrypted_email VARCHAR(255) NOT NULL
);

INSERT INTO UserEmails (email, encrypted_email) VALUES ('john.doe@example.com', 'TXkgd29yayBpcyBob3cgZW1haWw=');
INSERT INTO UserEmails (email, encrypted_email) VALUES ('jane.smith@example.com', 'WW91IGFyZSBhIG5ldyB3aXRoIGVtYWls');
INSERT INTO UserEmails (email, encrypted_email) VALUES ('bob.jones@example.com', 'VGhpcyBlbWFpbCBpcyBhbiBleHRyZW1lZCBtYW51YWxseQ==');
INSERT INTO UserEmails (email, encrypted_email) VALUES ('alice.wonderland@example.com', 'T3RoZXJzIGRpc2NvdmVyeSBjcmVhdGVkIHdpdGggdGVzdCBjb21wYXJl');
INSERT INTO UserEmails (email, encrypted_email) VALUES ('max.power@example.com', 'TWF4IG1hZGUgdGhhdCBpcyBhIGZvcndhcmQgZW1haWw=');
INSERT INTO UserEmails (email, encrypted_email) VALUES ('lisa.parker@example.com', 'TGlzYSBwYXJrZXIgaXMgYXR0YWNoZWQgd2l0aCB0ZXN0IGNvbXBhcmU=');
INSERT INTO UserEmails (email, encrypted_email) VALUES ('sam.brown@example.com', 'U2FtIGJyb3duIGlzIGF3ZXNvbWUgd2l0aCB0aGF0IGVtYWls');
INSERT INTO UserEmails (email, encrypted_email) VALUES ('emily.wilson@example.com', 'RW1pbHkgd2lubmVyIGlzIGEgbmV3IG5ldHdvcms=');
INSERT INTO UserEmails (email, encrypted_email) VALUES ('david.miller@example.com', 'RGF2aWQgbWlsbGVyIGVtYWlsIGJlY2F1c2U=');
INSERT INTO UserEmails (email, encrypted_email) VALUES ('sara.white@example.com', 'U2FyYSB3aGl0ZSBpcyBhIG5ldyB3ZWIgZW1haWw=');
