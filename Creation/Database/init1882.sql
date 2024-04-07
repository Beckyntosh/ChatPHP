CREATE TABLE IF NOT EXISTS sales_data (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    quarter VARCHAR(30) NOT NULL,
    camera_model VARCHAR(50) NOT NULL,
    sales INT(10) NOT NULL
);

INSERT INTO sales_data (quarter, camera_model, sales) VALUES ('Q1 2024', 'Camera A', 1000);
INSERT INTO sales_data (quarter, camera_model, sales) VALUES ('Q1 2024', 'Camera B', 800);
INSERT INTO sales_data (quarter, camera_model, sales) VALUES ('Q1 2024', 'Camera C', 1200);
INSERT INTO sales_data (quarter, camera_model, sales) VALUES ('Q1 2024', 'Camera D', 1500);
INSERT INTO sales_data (quarter, camera_model, sales) VALUES ('Q1 2024', 'Camera E', 900);
INSERT INTO sales_data (quarter, camera_model, sales) VALUES ('Q1 2024', 'Camera F', 1100);
INSERT INTO sales_data (quarter, camera_model, sales) VALUES ('Q1 2024', 'Camera G', 950);
INSERT INTO sales_data (quarter, camera_model, sales) VALUES ('Q1 2024', 'Camera H', 1300);
INSERT INTO sales_data (quarter, camera_model, sales) VALUES ('Q1 2024', 'Camera I', 700);
INSERT INTO sales_data (quarter, camera_model, sales) VALUES ('Q1 2024', 'Camera J', 1000);
