CREATE TABLE IF NOT EXISTS website_content (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    content_key VARCHAR(50) NOT NULL,
    english TEXT NOT NULL,
    spanish TEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO website_content (content_key, english, spanish) VALUES 
    ('welcome_message', 'Welcome to Our Prescription Medications Website', 'Bienvenido a nuestro sitio web de medicamentos recetados'),
    ('about_us', 'Learn more about our company', 'Conozca más sobre nuestra empresa'),
    ('contact_us', 'Contact us for any inquiries', 'Contáctenos para cualquier consulta'),
    ('services', 'Explore our services', 'Explore nuestros servicios'),
    ('products', 'View our product catalog', 'Vea nuestro catálogo de productos'),
    ('faq', 'Frequently Asked Questions', 'Preguntas frecuentes'),
    ('terms', 'Terms and conditions', 'Términos y condiciones'),
    ('privacy_policy', 'Privacy Policy', 'Política de privacidad'),
    ('delivery_info', 'Delivery information', 'Información de entrega'),
    ('payment_options', 'Payment options available', 'Opciones de pago disponibles');
