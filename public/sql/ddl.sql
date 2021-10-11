-- creacion de la vista de puntajes
DROP VIEW IF EXISTS VW_puntajes_totales;

CREATE VIEW VW_puntajes_totales AS (
    SELECT
        U.doc AS documento,
        CONCAT(U.nombre, ' ', U.apellido) AS usuarios,
        SUM(C.gramos) AS puntos
    FROM
        `codigos_usuarios` AS CU
        INNER JOIN `usuarios` AS U ON CU.usuario_doc = U.doc
        INNER JOIN `codigos` AS C ON CU.codigo_lote = C.id
    GROUP BY
        (U.doc)
)

-- cracion de vista puntajes por concurso--
DROP VIEW IF EXISTS VW_puntajes_semana;

CREATE VIEW VW_puntajes_semana AS (
    SELECT
        U.doc AS documento,
        CONCAT(U.nombre, ' ', U.apellido) AS usuarios,
        CU.id_concurso AS id_concurso,
        CC.nombre AS concurso,
        IF(CU.id_concurso = CC.id, SUM(C.gramos), 0) AS puntos_semana
    FROM
        `codigos_usuarios` AS CU
        INNER JOIN `usuarios` AS U ON CU.usuario_doc = U.doc
        INNER JOIN `codigos` AS C ON CU.codigo_lote = C.id
        INNER JOIN `concursos` AS CC ON CU.id_concurso = CC.id
    GROUP BY
        U.doc,
        CU.id_concurso
    ORDER BY
        CC.id ASC,
        puntos_semana DESC
)

--- creacion disparador concursos premios ---
DELIMITER $$
CREATE TRIGGER TR_podio
AFTER INSERT ON codigos_usuarios
FOR EACH ROW
    BEGIN
DECLARE puesto1 BIGINT(20);
DECLARE puesto2 BIGINT(20);
DECLARE puesto3 BIGINT(20);
DECLARE puesto4 BIGINT(20);
DECLARE puesto5 BIGINT(20);

IF EXISTS (SELECT 1 AS existe FROM concursos WHERE id = 1 AND NOW() >= fecha_inicial AND NOW <= fecha_final) THEN
   SET puesto1 = ( SELECT documento FROM VW_puntajes_semana WHERE id_concurso = 1 LIMIT 0,1);
   SET puesto2 = ( SELECT documento FROM VW_puntajes_semana WHERE id_concurso = 1 LIMIT 1,1);
   SET puesto3 = ( SELECT documento FROM VW_puntajes_semana WHERE id_concurso = 1 LIMIT 2,1);
   SET puesto4 = ( SELECT documento FROM VW_puntajes_semana WHERE id_concurso = 1 LIMIT 3,1);
   SET puesto5 = ( SELECT documento FROM VW_puntajes_semana WHERE id_concurso = 1 LIMIT 4,1);

   UPDATE concursos_premios SET concursos_premios.id_ganador = puesto1 WHERE concursos_premios.id_concurso = 1 AND concursos_premios.id_premio = 1;
   UPDATE concursos_premios SET concursos_premios.id_ganador = puesto2 WHERE concursos_premios.id_concurso = 1 AND concursos_premios.id_premio = 2;
   UPDATE concursos_premios SET concursos_premios.id_ganador = puesto3 WHERE concursos_premios.id_concurso = 1 AND concursos_premios.id_premio = 3;
   UPDATE concursos_premios SET concursos_premios.id_ganador = puesto4 WHERE concursos_premios.id_concurso = 1 AND concursos_premios.id_premio = 4;
   UPDATE concursos_premios SET concursos_premios.id_ganador = puesto5 WHERE concursos_premios.id_concurso = 1 AND concursos_premios.id_premio = 5;

ELSE
    IF EXISTS (SELECT 1 AS existe FROM concursos WHERE id = 2 AND NOW() >= fecha_inicial AND NOW <= fecha_final) THEN
        SET puesto1 = ( SELECT documento FROM VW_puntajes_semana WHERE id_concurso = 2 LIMIT 0,1);
        SET puesto2 = ( SELECT documento FROM VW_puntajes_semana WHERE id_concurso = 2 LIMIT 1,1);
        SET puesto3 = ( SELECT documento FROM VW_puntajes_semana WHERE id_concurso = 2 LIMIT 2,1);
        SET puesto4 = ( SELECT documento FROM VW_puntajes_semana WHERE id_concurso = 2 LIMIT 3,1);
        SET puesto5 = ( SELECT documento FROM VW_puntajes_semana WHERE id_concurso = 2 LIMIT 4,1);

        UPDATE concursos_premios SET concursos_premios.id_ganador = puesto1 WHERE concursos_premios.id_concurso = 2 AND concursos_premios.id_premio = 1;
        UPDATE concursos_premios SET concursos_premios.id_ganador = puesto2 WHERE concursos_premios.id_concurso = 2 AND concursos_premios.id_premio = 2;
        UPDATE concursos_premios SET concursos_premios.id_ganador = puesto3 WHERE concursos_premios.id_concurso = 2 AND concursos_premios.id_premio = 3;
        UPDATE concursos_premios SET concursos_premios.id_ganador = puesto4 WHERE concursos_premios.id_concurso = 2 AND concursos_premios.id_premio = 4;
        UPDATE concursos_premios SET concursos_premios.id_ganador = puesto5 WHERE concursos_premios.id_concurso = 2 AND concursos_premios.id_premio = 5;
    ELSE
        IF EXISTS (SELECT 1 AS existe FROM concursos WHERE id = 3 AND NOW() >= fecha_inicial AND NOW <= fecha_final) THEN
            SET puesto1 = ( SELECT documento FROM VW_puntajes_semana WHERE id_concurso = 3 LIMIT 0,1);
            SET puesto2 = ( SELECT documento FROM VW_puntajes_semana WHERE id_concurso = 3 LIMIT 1,1);
            SET puesto3 = ( SELECT documento FROM VW_puntajes_semana WHERE id_concurso = 3 LIMIT 2,1);
            SET puesto4 = ( SELECT documento FROM VW_puntajes_semana WHERE id_concurso = 3 LIMIT 3,1);
            SET puesto5 = ( SELECT documento FROM VW_puntajes_semana WHERE id_concurso = 3 LIMIT 4,1);

            UPDATE concursos_premios SET concursos_premios.id_ganador = puesto1 WHERE concursos_premios.id_concurso = 3 AND concursos_premios.id_premio = 1;
            UPDATE concursos_premios SET concursos_premios.id_ganador = puesto2 WHERE concursos_premios.id_concurso = 3 AND concursos_premios.id_premio = 2;
            UPDATE concursos_premios SET concursos_premios.id_ganador = puesto3 WHERE concursos_premios.id_concurso = 3 AND concursos_premios.id_premio = 3;
            UPDATE concursos_premios SET concursos_premios.id_ganador = puesto4 WHERE concursos_premios.id_concurso = 3 AND concursos_premios.id_premio = 4;
            UPDATE concursos_premios SET concursos_premios.id_ganador = puesto5 WHERE concursos_premios.id_concurso = 3 AND concursos_premios.id_premio = 5;
        END IF;
    END IF;
END IF;

END $$
DELIMITER ;