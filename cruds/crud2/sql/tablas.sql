-- Tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
-- Tabla de posts
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    contenido TEXT,
    estado ENUM('Publicado', 'Borrador') NOT NULL DEFAULT 'Borrador',
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Tabla usuarios, el password será secret0 en todos los casos
insert into usuarios(email, password) values('usuario1@email.com', '$2y$12$PMIsDu3kblxx5yaHjsDZj.nUUNj/r7bSLYPWTxz6peLCB/e7YuD9u');
insert into usuarios(email, password) values('usuario2@email.com', '$2y$12$PMIsDu3kblxx5yaHjsDZj.nUUNj/r7bSLYPWTxz6peLCB/e7YuD9u');
insert into usuarios(email, password) values('usuario3@email.com', '$2y$12$PMIsDu3kblxx5yaHjsDZj.nUUNj/r7bSLYPWTxz6peLCB/e7YuD9u');

-- Tablas posts
INSERT INTO posts (titulo, contenido, estado, user_id) VALUES
('Guía básica de JavaScript', 'Introducción a variables, funciones y eventos para principiantes.', 'Publicado', 1),
('Cómo mejorar el rendimiento en MySQL', 'Técnicas como índices, EXPLAIN y optimización de consultas.', 'Publicado', 2),
('Ideas para futuros proyectos', 'Listado de ideas pendientes: app de hábitos, mini CRM, dashboard personal.', 'Borrador', 3),
('Introducción a Docker', 'Conceptos de imágenes, contenedores y uso básico de Docker Compose.', 'Publicado', 1),
('Organización de tareas en equipos remotos', 'Métodos y herramientas para trabajo colaborativo a distancia.', 'Borrador', 2),
('Consejos para escribir código limpio', 'Buenas prácticas de nombrado, modularidad y documentación.', 'Publicado', 3),
('Experimentos con inteligencia artificial', 'Probando modelos de lenguaje y visión por computadora.', 'Borrador', 1),
('Errores comunes en PHP', 'Revisión de fallos habituales y cómo evitarlos de forma sencilla.', 'Publicado', 2),
('Mi experiencia aprendiendo React', 'Retos, conceptos claves y recursos útiles que encontré.', 'Publicado', 3),
('Plan de contenidos para el blog', 'Programación mensual de artículos y categorías principales.', 'Borrador', 1);


