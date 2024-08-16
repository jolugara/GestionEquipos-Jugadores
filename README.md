# Proyecto de Gestión de Equipos y Jugadores

Este proyecto es una aplicación de gestión de equipos y jugadores desarrollada en PHP. Permite gestionar equipos deportivos y sus respectivos jugadores.

## Configuración

Para utilizar este proyecto, sigue estos pasos:

1. Clona el repositorio en tu máquina local:

   ```bash
   git clone https://github.com/jolugara/GestionEquipos-Jugadores.git
   ```
2. Si fuera necesario aqui tienes unos insert de equipos y jugadores para SQL:
```bash
   INSERT INTO equipos (id, nombre, ciudad, deporte, fecha) 
   VALUES 
   (1, 'Sevilla', 'Sevilla', 'futbol', CURDATE()),
   (2, 'Betis', 'Sevilla', 'baloncesto', CURDATE()),
   (3, 'Madrid', 'Madrid', 'voleibol', CURDATE());
 ```

```bash
   INSERT INTO jugadores (id, nombre, numero, equipo, capitan) 
   VALUES 
   (1, 'Juan', 10, 1, 1),
   (2, 'Pedro', 9, 1, 0),
   (3, 'Carlos', 8, 1, 0),
   (4, 'Luis', 7, 1, 0),
   (5, 'David', 6, 1, 0),
   (6, 'Alberto', 10, 2, 1),
   (7, 'Francisco', 9, 2, 0),
   (8, 'Javier', 8, 2, 0),
   (9, 'Rafael', 7, 2, 0),
   (10, 'Sergio', 6, 2, 0),
   (11, 'Antonio', 10, 3, 1),
   (12, 'José', 9, 3, 0),
   (13, 'Manuel', 8, 3, 0),
   (14, 'Jorge', 7, 3, 0),
   (15, 'Fernando', 6, 3, 0);

