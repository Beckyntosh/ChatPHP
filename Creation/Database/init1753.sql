CREATE TABLE IF NOT EXISTS email_attachments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    mime_type VARCHAR(100),
    size INT(10),
    content LONGBLOB NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO email_attachments (filename, mime_type, size, content) VALUES ('Project Proposal.pdf', 'application/pdf', 1024, 'PDF_content_as_blob'),
('Marketing_Report.docx', 'application/msword', 512, 'DOCX_content_as_blob'),
('Meeting_Minutes.txt', 'text/plain', 256, 'TXT_content_as_blob'),
('Presentation.pptx', 'application/vnd.ms-powerpoint', 768, 'PPTX_content_as_blob'),
('Product_Catalog.jpg', 'image/jpeg', 2048, 'JPG_content_as_blob'),
('Invoice.pdf', 'application/pdf', 320, 'PDF_content_as_blob'),
('Feedback_Form.docx', 'application/msword', 128, 'DOCX_content_as_blob'),
('Event_Schedule.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 1024, 'XLSX_content_as_blob'),
('Training_Video.mp4', 'video/mp4', 4096, 'MP4_content_as_blob'),
('Company_Brochure.pdf', 'application/pdf', 2048, 'PDF_content_as_blob');
