CREATE TABLE IF NOT EXISTS zip_archives (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO zip_archives (filename) VALUES ('ProjectAlpha.zip');
INSERT INTO zip_archives (filename) VALUES ('DocumentFiles.zip');
INSERT INTO zip_archives (filename) VALUES ('ResearchDocs.zip');
INSERT INTO zip_archives (filename) VALUES ('HealthMaterials.zip');
INSERT INTO zip_archives (filename) VALUES ('WellnessFiles.zip');
INSERT INTO zip_archives (filename) VALUES ('ProjectBeta.zip');
INSERT INTO zip_archives (filename) VALUES ('StudyData.zip');
INSERT INTO zip_archives (filename) VALUES ('WellnessReports.zip');
INSERT INTO zip_archives (filename) VALUES ('AnalysisResults.zip');
INSERT INTO zip_archives (filename) VALUES ('ProductCatalog.zip');
