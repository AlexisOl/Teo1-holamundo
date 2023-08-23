

INSERT INTO `USUARIOS` (`id`, `nombre`, `contrasenia`) VALUES (NULL, 'admin', '1234'); 
INSERT INTO `USUARIOS` (`id`, `nombre`, `contrasenia`) VALUES (NULL, 'alexxus', 'hola'); 

INSERT INTO registroformacion.Equipos VALUES 
('001', 'Los Mejores', '20', '1999-01-11'),
('002', 'Los Gallos', '30', '1995-08-25'),
('003', 'Cruz Roja', '25', '1998-02-12'),
('004', 'Diablos Fc', '25', '1991-09-05'),
('005', 'Los Tomates', '26', '2002-11-13');

INSERT INTO registroestadios.Estadios VALUES 
('1', 'Olimpico', '15000', 'Ciudad de Guatemala'),
('2', 'El alquimista', '1500', 'Ciudad de Guatemala'),
('3', 'Fantasma', '1000', 'Peten'),
('4', 'Jose Alfredo', '2000', 'Zacapa'),
('5', 'Amanecer', '5000', 'Quetzaltenango');

INSERT INTO registroasignacion.Asignacion_Individual VALUES 
('1', '1', '001', '12'),
('2', '2', '002', '11'),
('3', '3', '003', '05'),
('4', '4', '001', '09'),
('5', '5', '005', '99');

INSERT INTO registroasignacion.Asigancion_Estadios VALUES 
('1',  '001', '1'),
('2',  '001', '2'),
('3',  '002', '3'),
('4',  '004', '4'),
('5',  '005', '5');