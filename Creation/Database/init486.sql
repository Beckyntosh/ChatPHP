CREATE TABLE IF NOT EXISTS vault_keys (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    api_key_name VARCHAR(50) NOT NULL,
    api_key_value TEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO vault_keys (api_key_name, api_key_value) VALUES ('Key1', 'Value1');
INSERT INTO vault_keys (api_key_name, api_key_value) VALUES ('Key2', 'Value2');
INSERT INTO vault_keys (api_key_name, api_key_value) VALUES ('Key3', 'Value3');
INSERT INTO vault_keys (api_key_name, api_key_value) VALUES ('Key4', 'Value4');
INSERT INTO vault_keys (api_key_name, api_key_value) VALUES ('Key5', 'Value5');
INSERT INTO vault_keys (api_key_name, api_key_value) VALUES ('Key6', 'Value6');
INSERT INTO vault_keys (api_key_name, api_key_value) VALUES ('Key7', 'Value7');
INSERT INTO vault_keys (api_key_name, api_key_value) VALUES ('Key8', 'Value8');
INSERT INTO vault_keys (api_key_name, api_key_value) VALUES ('Key9', 'Value9');
INSERT INTO vault_keys (api_key_name, api_key_value) VALUES ('Key10', 'Value10');
