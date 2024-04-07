CREATE TABLE SiteSettings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    setting_name VARCHAR(255) NOT NULL,
    setting_value VARCHAR(255) NOT NULL
);

INSERT INTO SiteSettings (setting_name, setting_value) VALUES ('site_theme', 'light');
INSERT INTO SiteSettings (setting_name, setting_value) VALUES ('site_language', 'English');
INSERT INTO SiteSettings (setting_name, setting_value) VALUES ('site_currency', 'USD');
INSERT INTO SiteSettings (setting_name, setting_value) VALUES ('site_logo', 'logo.png');
INSERT INTO SiteSettings (setting_name, setting_value) VALUES ('site_title', 'Makeup Website');
INSERT INTO SiteSettings (setting_name, setting_value) VALUES ('site_description', 'Your one-stop shop for all things makeup');
INSERT INTO SiteSettings (setting_name, setting_value) VALUES ('site_color', 'pink');
INSERT INTO SiteSettings (setting_name, setting_value) VALUES ('site_font', 'Arial');
INSERT INTO SiteSettings (setting_name, setting_value) VALUES ('site_background', 'white');
INSERT INTO SiteSettings (setting_name, setting_value) VALUES ('site_footer', '© Makeup Website 2021');