CREATE TABLE IF NOT EXISTS phones (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
brand VARCHAR(30) NOT NULL,
model VARCHAR(30) NOT NULL,
specs TEXT,
reg_date TIMESTAMP
);

INSERT INTO phones (brand, model, specs) VALUES ('Apple', 'iPhone 13', 'A15 Bionic chip, 5G capable, iOS 15');
INSERT INTO phones (brand, model, specs) VALUES ('Samsung', 'Galaxy S21', 'Snapdragon 888, 120Hz refresh rate, 5G connectivity');
INSERT INTO phones (brand, model, specs) VALUES ('Google', 'Pixel 6', 'Google Tensor chip, 90Hz refresh rate, Dual rear cameras');
INSERT INTO phones (brand, model, specs) VALUES ('OnePlus', '9 Pro', 'Snapdragon 888, 120Hz Fluid AMOLED display, Hasselblad camera system');
INSERT INTO phones (brand, model, specs) VALUES ('Xiaomi', 'Mi 11 Ultra', 'Snapdragon 888, 120x periscope telephoto camera, 50W fast charging');
INSERT INTO phones (brand, model, specs) VALUES ('Sony', 'Xperia 1 III', 'Snapdragon 888, 4K OLED display, Zeiss optics camera system');
INSERT INTO phones (brand, model, specs) VALUES ('Huawei', 'P50 Pro', 'Kirin 9000, 120Hz OLED display, Leica quad camera setup');
INSERT INTO phones (brand, model, specs) VALUES ('OPPO', 'Find X3 Pro', 'Snapdragon 888, 120Hz LTPO AMOLED display, Microlens camera');
INSERT INTO phones (brand, model, specs) VALUES ('Realme', 'GT 5G', 'Snapdragon 888, Super AMOLED display, 65W SuperDart charging');
INSERT INTO phones (brand, model, specs) VALUES ('Lenovo', 'Legion Phone Duel 2', 'Snapdragon 888, Dual cooling system, Dual pop-up selfie camera');