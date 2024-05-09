# Proyecto de Gestión de Equipos y Jugadores

Este proyecto es una aplicación de gestión de equipos y jugadores desarrollada en [nombre_del_lenguaje]. Permite gestionar equipos deportivos y sus respectivos jugadores.

## Configuración

Para utilizar este proyecto, sigue estos pasos:

1. Clona el repositorio en tu máquina local:

   ```bash
   [git clone https://github.com/tu_usuario/tu_repositorio.git](https://github.com/jolugara/GestionEquipos-Jugadores.git)
-- EQUIPOS
INSERT INTO equipos (id, nombre, ciudad, deporte, fecha) VALUES (1, 'Sevilla', 'Sevilla', 'futbol', CURDATE());
INSERT INTO equipos (id, nombre, ciudad, deporte, fecha) VALUES (2, 'Betis', 'Sevilla', 'baloncesto', CURDATE());
INSERT INTO equipos (id, nombre, ciudad, deporte, fecha) VALUES (3, 'Madrid', 'Madrid', 'voleibol', CURDATE());

-- JUGADORES
INSERT INTO jugadores (id, nombre, numero, equipo, capitan) VALUES (1, 'Juan', 10, 1, 1);
INSERT INTO jugadores (id, nombre, numero, equipo, capitan) VALUES (2, 'Pedro', 9, 1, 0);
INSERT INTO jugadores (id, nombre, numero, equipo, capitan) VALUES (3, 'Carlos', 8, 1, 0);
INSERT INTO jugadores (id, nombre, numero, equipo, capitan) VALUES (4, 'Luis', 7, 1, 0);
INSERT INTO jugadores (id, nombre, numero, equipo, capitan) VALUES (5, 'David', 6, 1, 0);

INSERT INTO jugadores (id, nombre, numero, equipo, capitan) VALUES (6, 'Alberto', 10, 2, 1);
INSERT INTO jugadores (id, nombre, numero, equipo, capitan) VALUES (7, 'Francisco', 9, 2, 0);
INSERT INTO jugadores (id, nombre, numero, equipo, capitan) VALUES (8, 'Javier', 8, 2, 0);
INSERT INTO jugadores (id, nombre, numero, equipo, capitan) VALUES (9, 'Rafael', 7, 2, 0);
INSERT INTO jugadores (id, nombre, numero, equipo, capitan) VALUES (10, 'Sergio', 6, 2, 0);

INSERT INTO jugadores (id, nombre, numero, equipo, capitan) VALUES (11, 'Antonio', 10, 3, 1);
INSERT INTO jugadores (id, nombre, numero, equipo, capitan) VALUES (12, 'José', 9, 3, 0);
INSERT INTO jugadores (id, nombre, numero, equipo, capitan) VALUES (13, 'Manuel', 8, 3, 0);
INSERT INTO jugadores (id, nombre, numero, equipo, capitan) VALUES (14, 'Jorge', 7, 3, 0);
INSERT INTO jugadores (id, nombre, numero, equipo, capitan) VALUES (15, 'Fernando', 6, 3, 0);
