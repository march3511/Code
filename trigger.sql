/*informe_vuelos vuelos

INSERT INTO informe_vuelos(cod_vuelo, cod_avion, valor, modificacion)
*/

DROP TRIGGER tr_generacion_tarjetas /* Eliminar Trigger*/

/* Trigger Directo para modificacion de avion o valor del vuelo y almacenado en tabla informe vuelos*/

DELIMITER //
CREATE TRIGGER trigger_informe_vuelos 
AFTER UPDATE ON vuelos
FOR EACH ROW 
BEGIN 
IF (NEW.cod_avion != OLD.cod_avion || NEW.valor != OLD.valor) THEN /*  Valida los datos nuevos y viejos para ejecutar el insert*/
  INSERT INTO informe_vuelos(
	  cod_vuelo, 
	  cod_avion, 
	  valor, 
	  modificacion) 
  VALUES (
	old.cod_vuelo, old.cod_avion, old.valor, now());
    END IF;
END// 
DELIMITER ; 


/* informe_vuelo datos_vuelo

INSERT INTO informe_vuelo(cod_vuelo, cod_avion, origen, destino, fecha_origen, hora_origen, modificacion) */

/* Procedimiento que se ejecuta con un trigger el cual se encarga de almacenar los datos en informe_vuelo solo si se cambio el origen o destino del vuelo*/

DELIMITER $$
CREATE PROCEDURE pro_informe_vuelo (IN cod_vuelo INT, IN origen INT , IN destino INT, IN  fecha_origen DATE, IN hora_origen INT, IN n_origen INT, IN n_destino INT)
BEGIN
IF (n_origen != origen || n_destino != destino) THEN
INSERT INTO informe_vuelo(cod_vuelo, origen, destino, fecha_origen, hora_origen, modificacion) 
VALUES (cod_vuelo, origen, destino, fecha_origen, hora_origen, now());
    END IF;
END$$
DELIMITER ;

/* Trigger que ejecuta el procedimiento anterior y envia los datos necesarios con el OLD -> dato anterios y NEW -> nuevo dato*/
DELIMITER $$
CREATE TRIGGER tr_generacion_tarjetas AFTER UPDATE on datos_vuelo
FOR EACH ROW
BEGIN
call pro_informe_vuelo(OLD.cod_vuelo, OLD.origen, OLD.destino, OLD.fecha_origen, OLD.hora_origen, NEW.origen, NEW.destino);
END$$
DELIMITER ;