CREATE TABLE IF NOT EXISTS archives (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filesize INT NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO archives (filename, filesize) VALUES ('ProjectAlpha_docs.zip', 10240);
INSERT INTO archives (filename, filesize) VALUES ('ProjectBeta_files.zip', 20480);
INSERT INTO archives (filename, filesize) VALUES ('ProjectGamma_docs.zip', 30720);
INSERT INTO archives (filename, filesize) VALUES ('ProjectDelta_reports.zip', 40960);
INSERT INTO archives (filename, filesize) VALUES ('ProjectEpsilon_data.zip', 51200);
INSERT INTO archives (filename, filesize) VALUES ('ProjectZeta_images.zip', 61440);
INSERT INTO archives (filename, filesize) VALUES ('ProjectEta_designs.zip', 71680);
INSERT INTO archives (filename, filesize) VALUES ('ProjectTheta_records.zip', 81920);
INSERT INTO archives (filename, filesize) VALUES ('ProjectIota_notes.zip', 92160);
INSERT INTO archives (filename, filesize) VALUES ('ProjectKappa_plans.zip', 102400);
