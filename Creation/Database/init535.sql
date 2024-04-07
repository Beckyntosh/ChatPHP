CREATE TABLE IF NOT EXISTS feedbacks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    message VARCHAR(255) NOT NULL,
    encrypted_message VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO feedbacks (message, encrypted_message) VALUES ('Great website with useful information', 'R3JlYXQgd2Vic2l0ZSB3aXRoIHVzdWFsIGltYWdlbmF0aW9u');
INSERT INTO feedbacks (message, encrypted_message) VALUES ('Love the variety of gardening tools available', 'TG92ZSB0aGUgdmFyaWV0eSBvZiBnYXJkZW5pbmcgdG9vbHMgYXZhaWxhYmxl');
INSERT INTO feedbacks (message, encrypted_message) VALUES ('Easy to navigate and find what I need', 'RWFzeSB0byBuYXZpZ2F0ZSBhbmQgZmluZCB3aGF0IEkgbmVlZA==');
INSERT INTO feedbacks (message, encrypted_message) VALUES ('Fast delivery and good customer service', 'RmFzdCBkZWxpdmVyeSBhbmQgZ29vZCBjdXN0b21lciBzZXJ2aWNl');
INSERT INTO feedbacks (message, encrypted_message) VALUES ('Excellent quality products at affordable prices', 'RXhjZWxsZW50IHF1YWxpdHkgcHJvZHVjdHMgYXQgYWZmb3JhYmxlIHByaWNlczs=');
INSERT INTO feedbacks (message, encrypted_message) VALUES ('Recommend this site to all gardeners', 'UmVjb21tZW5kIHRoaXMgc2l0ZSB0byBhbGwgZ2FyZGVuZXJz');
INSERT INTO feedbacks (message, encrypted_message) VALUES ('Great experience overall, will come back for more', 'R3JlYXQgZXhwZXJpZW5jZSBvdmVyYWxsLCB3aWxsIGNvbWUgYmFjayBmb3IgbW9yZQ==');
INSERT INTO feedbacks (message, encrypted_message) VALUES ('Impressed with the service and product quality', 'SW1wcmVzc2VkIHdpdGggdGhlIHNlcnZpY2UgYW5kIHByb2R1Y3QgcXVhbGl0eQ==');
INSERT INTO feedbacks (message, encrypted_message) VALUES ('Good prices for the tools available', 'R29vZCBwcmljZXMgZm9yIHRoZSB0b29scyBhdmFpbGFibGU=');
INSERT INTO feedbacks (message, encrypted_message) VALUES ('User-friendly website, highly recommended', 'VXNlci1mcmllbmRseSB3ZWJzaXRlLCBoaWdoeSByZWNvbW1lbmRlZA==');
