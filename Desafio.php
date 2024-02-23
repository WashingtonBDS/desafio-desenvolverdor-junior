<?php

function encontrarAnagramas($entrada) {
    $anagramas = [];
    foreach ($entrada as $item) {
        $str = $item["str"];
        $chave = str_split($str);
        sort($chave);
        $chave = implode("", $chave);
        if (!isset($anagramas[$chave])) {
            $anagramas[$chave] = [];
        }
        $anagramas[$chave][] = $str;
    }

    $saida = [];
    foreach ($anagramas as $grupo) {
        if (count($grupo) > 1) {
            $saida[] = ["anagramas" => $grupo];
        }
    }
    return $saida;
}

$json_entrada = '[
    { "str": "amor" },
    { "str": "roma" },
    { "str": "padre" },
    { "str": "ignorado" },
    { "str": "bolo" },
    { "str": "rota" },
    { "str": "nada" },
    { "str": "ator" },
    { "str": "lobo" },
    { "str": "pedra" }
]';

$entrada = json_decode($json_entrada, true);
$saida = encontrarAnagramas($entrada);
echo json_encode($saida, JSON_PRETTY_PRINT);

?>
