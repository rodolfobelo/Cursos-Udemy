<?php

require_once(dirname(__FILE__, 2) . '/src/config/Database.php');

Database::getConnection();



$arrayIDLAN = "'2542373', '2562864', '2562865', '2562868', '2562878'";
$cpf = '06613139300';
$sql = "DECLARE @CPF VARCHAR(MAX) = $cpf,
@SACADO VARCHAR(MAX),
@VALOR_DEVIDO NUMERIC(12,2),
@ACUMULADO_JUROS NUMERIC(12,2),
@ACUMULADO_MULTA NUMERIC(12,2),
@VALOR_ATUALIZADO NUMERIC(12,2),
@QTD_PARCELAS INT,
@PLETIVO INT,
@QTD_COD_TIPOCURSO INT,
@ACORDOABERTO CHAR,
@ACORDOVENCIDO CHAR


SELECT 
@SACADO = SACADO,
@VALOR_DEVIDO = SUM(VALOR_ORIGINAL_NEG),
@ACUMULADO_JUROS = SUM(JUROS_DIA_NEG),
@ACUMULADO_MULTA = SUM(MULTA_NEG),     
@VALOR_ATUALIZADO = SUM(VALOR_ATUALIZADO_NEG),
@QTD_PARCELAS = COUNT(IDLAN_NEG),
@CPF = cpf_neg,
@QTD_COD_TIPOCURSO = count(distinct COD_TIPOCURSO_NEG),

@ACORDOABERTO = (SELECT [ACORDO ABERTO] FROM DBO.FN_NEG_ACORDO_VENCIDO_ABERTO (@CPF)),
@ACORDOVENCIDO = (SELECT VENCIDO FROM DBO.FN_NEG_ACORDO_VENCIDO_ABERTO (@CPF)),

@PLETIVO = CASE WHEN @ACORDOVENCIDO > 0 THEN 0
            WHEN @ACORDOABERTO > 0  THEN 0 ELSE
(SELECT TOP 1 PTEMPLATE.PERLETIVO FROM DBO.FN_NEG_PERIODO_TEMPLATE(@CPF) AS PTEMPLATE
WHERE PTEMPLATE.IDLAN IN ($arrayIDLAN)
GROUP BY PTEMPLATE.PERLETIVO ORDER BY COUNT(*) , MAX(PTEMPLATE.PERLETIVO) DESC)
END

FROM VW_NEG_DEBITOS_ALUNO
WHERE 
cpf_neg = @CPF
AND IDLAN_NEG IN ($arrayIDLAN)

GROUP BY SACADO, cpf_neg

select 
negTemplate.descricao,
@PLETIVO AS PLETIVO,
@SACADO AS SACADO,
@CPF AS CPF,
CASE negFormPagamento.id_forma_pagamento_rm
WHEN 1 THEN 'A VISTA'
WHEN 2 THEN 'CRÉDITO'
WHEN 3 THEN 'BOLETO'
END AS formaPagamento,
@VALOR_DEVIDO AS VALOR_DEVIDO,
@ACUMULADO_JUROS AS ACUMULADO_JUROS,
@ACUMULADO_MULTA AS ACUMULADO_MULTA,
@VALOR_DEVIDO + @ACUMULADO_MULTA + @ACUMULADO_JUROS AS VALOR_TOTAL_DEVIDO,
negFormPagamento.qtd_max_parcelas AS MAX_PARCELAS,

CAST((@VALOR_DEVIDO)  * (CAST(negFormPagamento.perc_desconto AS numeric(12, 2))/100.00) AS NUMERIC(12,2)) AS DESCONTO_PAG_CONCEDER,
CAST(@ACUMULADO_JUROS * (CAST(perc_juros AS numeric(12, 2))/100.00) AS NUMERIC(12,2)) AS JUROS_COBRAR,
CAST(@ACUMULADO_MULTA * (CAST(perc_multa AS numeric(12, 2))/100.00) AS NUMERIC(12,2)) AS MULTA_COBRAR,   

(@VALOR_DEVIDO + @ACUMULADO_MULTA + @ACUMULADO_JUROS) - CAST(
(@VALOR_DEVIDO + CAST(@ACUMULADO_JUROS * (CAST(perc_juros AS numeric(12, 2))/100.00) AS NUMERIC(12,2)) + CAST(@ACUMULADO_MULTA * (CAST(perc_multa AS numeric(12, 2))/100.00) AS NUMERIC(12,2)) 
- CAST((@VALOR_DEVIDO) * (CAST(negFormPagamento.perc_desconto AS numeric(12, 2))/100.00) AS NUMERIC(12,2))) AS numeric(12,2)
) AS VALOR_TOTAL_NAO_COBRADO,

CAST(
(@VALOR_DEVIDO + CAST(@ACUMULADO_JUROS * (CAST(perc_juros AS numeric(12, 2))/100.00) AS NUMERIC(12,2)) + CAST(@ACUMULADO_MULTA * (CAST(perc_multa AS numeric(12, 2))/100.00) AS NUMERIC(12,2)) 
- CAST((@VALOR_DEVIDO) * (CAST(negFormPagamento.perc_desconto AS numeric(12, 2))/100.00) AS NUMERIC(12,2))) AS numeric(12,2)
)   AS VALOR_FINAL_COBRAR,

CAST((@VALOR_DEVIDO + CAST(@ACUMULADO_JUROS * (CAST(perc_juros AS numeric(12, 2))/100.00) AS NUMERIC(12,2)) +
            CAST(@ACUMULADO_MULTA * (CAST(perc_multa AS numeric(12, 2))/100.00) AS NUMERIC(12,2))) * (CAST(perc_entrada AS numeric(12,2))/100.00) AS numeric(12, 2)) AS VALOR_ENTRADA,
negFormPagamento.perc_entrada

from [Unifametro_NTI].[dbo].[neg_templates] AS negTemplate
inner join [Unifametro_NTI].[dbo].[neg_forma_pagamento_templates] AS negFormPagamento
     on negFormPagamento.id_template = negTemplate.id
where 
(@QTD_PARCELAS >= negTemplate.qtd_min_parcelas_atraso and @QTD_PARCELAS <= negTemplate.qtd_max_parcelas_atraso)
AND negTemplate.periodo_parcela = @PLETIVO
AND negTemplate.acordo_aberto = @ACORDOABERTO 
AND negTemplate.acordo_atrasado = @ACORDOVENCIDO
AND @QTD_COD_TIPOCURSO = 1";
// $var = "2, 3, 5";
// $sql = "select * from users where id in ( $var )";
$result = Database::getResultFromQuery($sql);

while ($row = $result->fetch_assoc()){
    print_r($row);
    echo '<br>';
}