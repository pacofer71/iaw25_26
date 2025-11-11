CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) UNIQUE NOT NULL,
    descripcion TEXT,
    precio DECIMAL(7,2) CHECK (precio BETWEEN 1 AND 9999.99),
    stock INT CHECK (stock >= 0)
);
INSERT INTO productos (nombre, descripcion, precio, stock) VALUES
('Cafetera Express Philips 5400', 'Cafetera automática con molinillo integrado y espumador de leche.', 749.99, 25),
('Televisor Samsung 55" QLED', 'Televisor 4K UHD con tecnología QLED y conexión Wi-Fi.', 1299.00, 15),
('Aspiradora Xiaomi Mi Vacuum', 'Aspiradora robot inteligente con control por app.', 399.90, 40),
('Smartwatch Garmin Venu 2', 'Reloj inteligente con GPS, medición de oxígeno y ritmo cardíaco.', 289.99, 35),
('Portátil Lenovo ThinkPad E15', 'Portátil profesional con procesador Intel i7 y SSD 512GB.', 989.50, 20),
('Silla Ergonómica Secretlab Titan Evo', 'Silla gamer ergonómica de alta calidad con soporte lumbar ajustable.', 499.00, 10),
('Auriculares Sony WH-1000XM5', 'Auriculares inalámbricos con cancelación activa de ruido.', 349.99, 50),
('Monitor LG Ultrawide 34"', 'Monitor curvo 34 pulgadas con resolución QHD.', 599.00, 18),
('Teclado Mecánico Keychron K6', 'Teclado mecánico inalámbrico con interruptores red.', 119.99, 60),
('Mouse Logitech MX Master 3S', 'Ratón ergonómico inalámbrico con sensor de alta precisión.', 109.00, 70),
('Disco SSD Samsung 1TB', 'Unidad de estado sólido NVMe M.2 de alto rendimiento.', 139.99, 100),
('Cámara Canon EOS M50 Mark II', 'Cámara mirrorless con grabación 4K y pantalla abatible.', 799.00, 12),
('Impresora HP LaserJet Pro M404dn', 'Impresora láser monocromo rápida y eficiente.', 279.50, 30),
('Router TP-Link Archer AX73', 'Router Wi-Fi 6 de alto rendimiento con 6 antenas.', 189.00, 25),
('Microondas Panasonic 1200W Inverter', 'Microondas digital con tecnología inverter y grill.', 179.90, 22),
('Licuadora Oster Pro 1200', 'Licuadora potente con vaso de vidrio resistente y cuchillas reversibles.', 89.99, 45),
('Refrigerador LG No Frost 420L', 'Refrigerador de bajo consumo con sistema No Frost.', 1799.00, 8),
('Consola PlayStation 5', 'Consola de videojuegos de última generación con SSD ultrarrápido.', 699.99, 14),
('Juego The Legend of Zelda: Tears of the Kingdom', 'Videojuego de aventura exclusivo para Nintendo Switch.', 69.99, 80),
('Cafetera Nespresso Essenza Mini', 'Cafetera compacta de cápsulas con apagado automático.', 129.90, 55);
