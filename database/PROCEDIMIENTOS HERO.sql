USE superhero;

SELECT * FROM alignment;	-- BANDOS
SELECT * FROM attribute;	-- ATRIBUTOS / CARACTERISTICAS
SELECT * FROM colour;		-- COLORES
SELECT * FROM comic;		-- NO SE UTILIZARÁ
SELECT * FROM gender;		-- GENEROS
SELECT * FROM publisher;	-- CASA PUBLICACION / DISTRIBUIDORES
SELECT * FROM race;			-- RAZAS
SELECT * FROM superhero;	-- SUPER HEROES
SELECT * FROM superpower;	-- NO SE UTILIZARA

-- SPU PARA LISTAR EN SELECT
DELIMITER $$
CREATE PROCEDURE spu_publisher_listar()
BEGIN
	SELECT
	id,
	publisher_name
	FROM publisher;
END $$
CALL spu_publisher_listar


-- SPU PARA BUSCAR POR EL SELECT
DELIMITER $$
CREATE PROCEDURE spu_publisher_search
(
IN _publisher_id INT
)
BEGIN
 SELECT
     SH.id,
     PU.publisher_name,
     SH.superhero_name,
     SH.full_name,
     GE.gender,
     RC.race
 FROM superhero SH
 INNER JOIN gender GE ON GE.id = SH.gender_id
 INNER JOIN race RC ON RC.id = SH.race_id
 INNER JOIN publisher PU ON PU.id = SH.publisher_id
 WHERE SH.publisher_id = _publisher_id
 ORDER BY SH.publisher_id;

END $$
CALL spu_publisher_search (3);






SELECT superhero_name FROM superhero WHERE publisher_id = 1;
