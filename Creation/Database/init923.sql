CREATE TABLE IF NOT EXISTS document_signatures (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    document_name VARCHAR(255) NOT NULL,
    signature TEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO document_signatures (document_name, signature) VALUES ('contract1.pdf', 'ASDfjndf98fdu33453dfgdf==');
INSERT INTO document_signatures (document_name, signature) VALUES ('agreement.docx', 'QWEkdfg4678dghjdg8sdfg==');
INSERT INTO document_signatures (document_name, signature) VALUES ('invoice.pdf', 'ZXCkdfg98sdfhwe79fgh35==');
INSERT INTO document_signatures (document_name, signature) VALUES ('resume.pdf', 'LKJ2dfg77sdfmy67dfklf==');
INSERT INTO document_signatures (document_name, signature) VALUES ('proposal.doc', 'POIdfg56dhjeo44dfhrwq==');
INSERT INTO document_signatures (document_name, signature) VALUES ('report.pdf', 'MNB9378sdjkmn49asdfg9==');
INSERT INTO document_signatures (document_name, signature) VALUES ('letter.docx', 'BVCkdfg7778sdjfhgqwe==');
INSERT INTO document_signatures (document_name, signature) VALUES ('presentation.pptx', 'HGFsdfg38kadf7894kfgh==');
INSERT INTO document_signatures (document_name, signature) VALUES ('form.pdf', 'TYU8adfklj35dfkgjdre==');
INSERT INTO document_signatures (document_name, signature) VALUES ('manual.doc', 'WERsadf34qlkdsf79dfgh==');
