CREATE TABLE archive_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO archive_uploads (filename) VALUES ('ProjectAlpha.zip');
INSERT INTO archive_uploads (filename) VALUES ('ResearchDocs.zip');
INSERT INTO archive_uploads (filename) VALUES ('PresentationFiles.zip');
INSERT INTO archive_uploads (filename) VALUES ('ProjectBeta.zip');
INSERT INTO archive_uploads (filename) VALUES ('DataAnalysis.zip');
INSERT INTO archive_uploads (filename) VALUES ('ExperimentResults.zip');
INSERT INTO archive_uploads (filename) VALUES ('ThesisMaterials.zip');
INSERT INTO archive_uploads (filename) VALUES ('MeetingNotes.zip');
INSERT INTO archive_uploads (filename) VALUES ('ReportDocuments.zip');
INSERT INTO archive_uploads (filename) VALUES ('ProposalFiles.zip');