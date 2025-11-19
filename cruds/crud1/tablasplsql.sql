-- TABLAS RELACION 3 --
drop table ventas cascade constraints;
drop table empleados cascade constraints;
drop table departamentos cascade constraints;
drop table articulos cascade constraints;
drop table copiaEmpleados; 

-- ------------------------
create table articulos(
	id_art int not null primary key,
	nom_art varchar2(30) not null,
	precio number(8,2) not null,
	stock int default 0
);

-- Tabla departamentos --
create table departamentos(
	id_dep char(3),
	nom_dep varchar2(25),
	constraint pk_departamentos primary key(id_dep)
);

-- Tabla empleados --
create table empleados(
	id_emp char(3),
	nom_emp varchar2(40),
	sueldo number(7, 2),
	pass_emp varchar2(10),
	dep char(3),
	constraint pk_empleados primary key(id_emp),
	constraint fk_empleados_departamentos foreign key(dep) references departamentos(id_dep) on delete cascade,
	constraint ck_sueldo check(sueldo > 0)
);
-- TABLA ventas -----------------------------
create table ventas(
	cod int primary key not null,
	emp char(3) not null,
	art int not null,
	cantidad int default 1 not null,
	constraint fk_ventas_emp foreign key(emp) references empleados(id_emp) on delete cascade,
	constraint fk_ventas_art foreign key(art) references articulos(id_art) on delete cascade,
	constraint ck_cant check (cantidad>0)
);

-- DATOS RELACION 3 --
-- Articulos
insert into articulos values(1, 'Portatil 13', 345.56, 12);
insert into articulos values(2, 'Portatil 16', 395.56, 2);
insert into articulos values(3, 'Pen 32Gb', 45.56, 7);
insert into articulos values(4, 'Pen 64Gb', 85.56, 19);
insert into articulos values(5, 'Raton USB', 5.56, 102);
insert into articulos values(6, 'Teclado USB', 5.96, 2);
insert into articulos values(7, 'Tablet 10.1', 145.56, 3);
insert into articulos values(8, 'Movil 5.5 32GB', 149.56, 32);
insert into articulos values(9, 'TV 64 OLED', 945.56, 2);
insert into articulos values(10, 'TV 32 LCD', 125.56, 22);
-- Datos departamentos --
insert into departamentos values('D01', 'Jefe');
insert into departamentos values('D02', 'Administrativo');
insert into departamentos values('D03', 'Becario');
insert into departamentos values('D04', 'Apoyo');

-- Datos empleados --
insert into empleados values('E01', 'Javier', '2000', 'admin', 'D01');
insert into empleados values('E02', 'Ernesto', '2200', 'admin', 'D01');
insert into empleados values('E03', 'Francisco', '1900', 'admin', 'D01');
insert into empleados values('E04', 'David', '1870', 'admin', 'D01');

insert into empleados values('E05', 'Ana', '1600', 'contra', 'D02');
insert into empleados values('E06', 'Encarna', '1560', 'contra', 'D02');
insert into empleados values('E07', 'Rogelio', '1490', 'contra', 'D02');
insert into empleados values('E08', 'Elias', '1700', 'contra', 'D02');

insert into empleados values('E09', 'Jose', '600', 'usuario', 'D03');
insert into empleados values('E10', 'Alvaro', '720', 'usuario', 'D03');
insert into empleados values('E11', 'Daniel', '810', 'usuario', 'D03');
insert into empleados values('E12', 'Miguel', '680', 'usuario', 'D03');

insert into empleados values('E13', 'Bardo', '1000', '1234', 'D04');
insert into empleados values('E14', 'Andrés', '1150', '1234', 'D04');
insert into empleados values('E15', 'Adrián', '990', '1234', 'D04');
insert into empleados values('E16', 'Nerea', '1050', '1234', 'D04');
-- --------------------------------
insert into ventas values(1, 'E01', 1, 12);
insert into ventas values(2, 'E01', 2, 1);
insert into ventas values(3, 'E02', 3, 4);
insert into ventas values(4, 'E02', 4, 5);
insert into ventas values(5, 'E03', 5, 6);
insert into ventas values(6, 'E03', 6, 7);
insert into ventas values(7, 'E04', 7, 8);
insert into ventas values(8, 'E04', 8, 1);
insert into ventas values(9, 'E05', 9, 2);
insert into ventas values(10, 'E05', 10, 4);
insert into ventas values(11, 'E06', 1, 5);
insert into ventas values(12, 'E06', 2, 6);
insert into ventas values(13, 'E07', 3, 7);
insert into ventas values(14, 'E08', 4, 8);
insert into ventas values(15, 'E09', 5, 9);
insert into ventas values(16, 'E10', 6, 2);
insert into ventas values(17, 'E11', 7, 12);
insert into ventas values(18, 'E12', 8, 15);
insert into ventas values(19, 'E13', 9, 2);
insert into ventas values(20, 'E14', 10, 5);

-- Tabla copiaEmpleados
create table copiaEmpleados(
	id_emp char(3),
	nom_emp varchar2(40),
	sueldo number(7, 2),
	pass_emp varchar2(10),
	dep char(3),
	fecha_copia date
);
