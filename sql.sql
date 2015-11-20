SELECT * FROM reserva r inner join pasajero p on r.cedula = p.cedula 
					  inner join datos_vuelo d on r.cod_vuelo = d.cod_vuelo
                      inner join aeropuertos a on d.origen = a.cod_aeropuerto AND a.cod_aeropuerto = d.destino;
                      
SELECT * FROM datos_vuelo d inner join aeropuertos a on d.origen = a.cod_aeropuerto AND d.destino = a.cod_aeropuerto;                     

CREATE VIEW vista_select_vuelos AS (                      
SELECT v.cod_vuelo, a.tipo, c.nombre FROM vuelos v inner join aviones a on a.cod_avion = v.cod_avion 
						inner join compañia c on a.cod_compañia = c.cod_compañia                      
);

                      
SELECT r.cod_reserva, r.cedula, p.nombres, p.apellidos, r.num_pasajeros, d.origen, d.destino, v.valor FROM reserva r 
					  inner join pasajero p on r.cedula = p.cedula 
					  inner join datos_vuelo d on r.cod_vuelo = d.cod_vuelo
                      inner join vuelos v on v.cod_vuelo = d.cod_vuelo;
                      
CREATE VIEW vista_reservas AS (
SELECT r.cod_reserva, r.cedula, p.nombres, p.apellidos, r.num_pasajeros, d.origen, d.destino, rv.valor FROM reserva r 
					  inner join pasajero p on r.cedula = p.cedula 
                      inner join reserva_vuelos rv on rv.cod_reserva = r.cod_reserva
                      inner join datos_vuelo d on rv.cod_vuelo = d.cod_vuelo				
) ;


select * from vista_reservas;


SELECT * FROM reserva r INNER JOIN reserva_vuelos rv ON r.cod_reserva = rv.cod_reserva 
						INNER JOIN datos_vuelo d ON rv.cod_vuelo = d.cod_vuelo;

ALTER TABLE reserva_vuelos 
ADD CONSTRAINT reserva_vuelos_fk 
FOREIGN KEY (cod_reserva) 
REFERENCES reserva (cod_reserva) 
ON DELETE NO ACTION 
ON UPDATE NO ACTION ;



SELECT a.cod_aeropuerto, a.nombre, c.cod_ciudad, c.nombre FROM aeropuertos a inner join ciudad c on a.cod_ciudad = c.cod_ciudad;


SELECT * FROM ciudad inner join departamento on departamento.cod_dpto = ciudad.cod_dept;


SELECT * FROM aviones inner join compañia on aviones.cod_compañia = compañia.cod_compañia;

/*Vuelo	Avion	Origen	Destino	Fecha Origen	Hora Origen	Valor*/
SELECT v.cod_vuelo FROM vuelos v INNER JOIN datos_vuelo dv ON v.cod_vuelo = dv.cod_vuelo;


CREATE VIEW vista_vuelos AS (
SELECT v.cod_vuelo, c.nombre, dv.origen, dv.destino, dv.fecha_origen, dv.hora_origen, v.valor FROM vuelos v 
					   INNER JOIN datos_vuelo dv ON v.cod_vuelo = dv.cod_vuelo
					   INNER JOIN aviones a ON v.cod_avion = a.cod_avion
                       INNER JOIN compañia c ON c.cod_compañia = a.cod_compañia
);


SELECT * FROM aviones inner join compañia on compañia.cod_compañia = aviones.cod_compañia;

﻿CREATE TABLE historico_vuelos
(
  cod_vuelo character varying(10),
  cod_avion integer,
  origen integer,
  destino integer,
  fecha_origen integer,
  hora_origen integer,
  fecha_mod character varying(10)
  );


CREATE OR REPLACE FUNCTION historico_vuelos()
  RETURNS trigger AS
$BODY$

  DECLARE
  BEGIN

    INSERT INTO historico_vuelos(
		cod_vuelo, 
		cod_avion, 
		origen, 
		destino, 
		fecha_origen, 
		hora_origen, 
		fecha_modificacion) 
	VALUES (   

			old.cod_vuelo, 
			old.cod_avion, 
			old.origen, 
			old.destino, 
			old.fecha_origen, 
			old.hora_origen,
            now()             
               );

    RETURN NULL;
  END;
$BODY$
  LANGUAGE mysqlsql VOLATILE
  COST 100;
ALTER FUNCTION historico_vuelos()
  OWNER TO mysql;



CREATE TRIGGER t1
  AFTER UPDATE OF origen
  ON datos_vuelos
  FOR EACH ROW
  EXECUTE PROCEDURE historico_vuelos();
  
  
  