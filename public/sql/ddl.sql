-- creacion de la vista de puntajes
DROP VIEW IF EXISTS VW_puntajes;

CREATE VIEW VW_puntajes AS (
    SELECT
        U.doc AS documento,
        CONCAT(U.nombre, ' ', U.apellido) AS usuarios,
        SUM(C.gramos) AS puntos
    FROM
        `codigos_usuarios` AS CU
        INNER JOIN `usuarios` AS U ON CU.usuario_doc = U.doc
        INNER JOIN `codigos` AS C ON CU.codigo_lote = C.lote
    GROUP BY
        (U.doc)
) --- creacion disparador concursos premios ---
DELIMITER $ $ CREATE TRIGGEER TR_podio
AFTER
INSERT
    ON codigos_usuarios FOR EACH ROW BEGIN DECLARE puesto1 TINYINT;

DECLARE puesto2 TINYINT;

DECLARE puesto3 TINYINT;

DECLARE puesto4 TINYINT;

DECLARE puesto5 TINYINT;

DECLARE consulta TINYINT;

SET
    consulta = (
        SELECT
            documento,
            MAX(puntos)
        FROM
            VW_puntajes
        WHERE
    )
END $ $ DELIMITER;