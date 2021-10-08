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
        INNER JOIN `codigos` AS C ON CU.codigo_lote = C.lote
    GROUP BY
        (U.doc)
) 

-- cracion de vista puntajes por concurso-- 
DROP VIEW IF EXISTS VW_puntajes_semana;

CREATE VIEW VW_puntajes_semana AS (
    SELECT
        U.doc AS documento,
        CONCAT(U.nombre, ' ', U.apellido) AS usuarios,
        CC.nombre AS  concurso,
        IF(CU.id_concurso <> CC.id, SUM(C.gramos),0) AS puntos_semana
    FROM
        `codigos_usuarios` AS CU
        INNER JOIN `usuarios` AS U ON CU.usuario_doc = U.doc
        INNER JOIN `codigos` AS C ON CU.codigo_lote = C.lote
        INNER JOIN `concursos` AS CC ON CU.id_concurso = CC.id
    GROUP BY U.doc, CU.id_concurso
)

--- creacion disparador concursos premios ---
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