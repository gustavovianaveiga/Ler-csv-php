<?php


$arquivo = $_FILES['excel'];


if ($arquivo['type'] == "text/csv") {
    $dados_arquivo = fopen($arquivo["tmp_name"], "r");

    //skip headers
    fgetcsv($dados_arquivo, 1000, ";");
    fgetcsv($dados_arquivo, 1000, ";");

    while ($linha = fgetcsv($dados_arquivo, 1000, ";")) {
        array_walk_recursive($linha, 'converter');
        if ((var_export($linha[0], true)) == "''") {
        } else {

            echo '</pre>';


            $id_produto = var_export($linha[0], true);
            $id_tipo_produto = var_export($linha[1], true);
            $tipo_produto = var_export($linha[2], true);
            $preco_compra = var_export($linha[3], true);
            $preco_venda = var_export($linha[4], true);
            $estoque_atual = var_export($linha[5], true);
            $fabricante = var_export($linha[12], true);
            $data = date('d/m/Y');

            $result = $id_produto . "<br>" . $id_tipo_produto . "<br>" . $tipo_produto . "<br>" . $preco_compra . "<br>" . $preco_venda . "<br>" . $estoque_atual . "<br>" . $fabricante . "<br>" . $data . "<br>";

            echo $result;

            echo '</pre>';


        }
    }
} else {
    echo "envie um arquivo valido";
}
function converter(&$dados_arquivo)
{
    $dados_arquivo = mb_convert_encoding($dados_arquivo, "UTF-8", "ISO-8859-1");
}