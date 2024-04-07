CREATE TABLE file_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    file_type VARCHAR(10) NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create table for research data
CREATE TABLE research_data (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    data1 VARCHAR(255) NOT NULL,
    data2 VARCHAR(255) NOT NULL
);

-- Insert some sample data into file_uploads table
INSERT INTO file_uploads (file_name, file_type) VALUES ('example1.txt', 'txt');
INSERT INTO file_uploads (file_name, file_type) VALUES ('example2.json', 'json');
INSERT INTO file_uploads (file_name, file_type) VALUES ('example3.txt', 'txt');
INSERT INTO file_uploads (file_name, file_type) VALUES ('example4.json', 'json');
INSERT INTO file_uploads (file_name, file_type) VALUES ('example5.txt', 'txt');
INSERT INTO file_uploads (file_name, file_type) VALUES ('example6.json', 'json');
INSERT INTO file_uploads (file_name, file_type) VALUES ('example7.txt', 'txt');
INSERT INTO file_uploads (file_name, file_type) VALUES ('example8.json', 'json');
INSERT INTO file_uploads (file_name, file_type) VALUES ('example9.txt', 'txt');
INSERT INTO file_uploads (file_name, file_type) VALUES ('example10.json', 'json');

-- Insert some sample data into research_data table
INSERT INTO research_data (data1, data2) VALUES ('value1', 'value2');
INSERT INTO research_data (data1, data2) VALUES ('value3', 'value4');
INSERT INTO research_data (data1, data2) VALUES ('value5', 'value6');
INSERT INTO research_data (data1, data2) VALUES ('value7', 'value8');
INSERT INTO research_data (data1, data2) VALUES ('value9', 'value10');
INSERT INTO research_data (data1, data2) VALUES ('value11', 'value12');
INSERT INTO research_data (data1, data2) VALUES ('value13', 'value14');
INSERT INTO research_data (data1, data2) VALUES ('value15', 'value16');
INSERT INTO research_data (data1, data2) VALUES ('value17', 'value18');
INSERT INTO research_data (data1, data2) VALUES ('value19', 'value20');