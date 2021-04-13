<?php

function gerar_senha ($tamanho, $maiusculas, $minusculas, $numeros, $simbolos){
    $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
    $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
    $nu = "0123456789"; // $nu contem os números
    $si = "!@#$%¨&*()_+="; // $si contem os símbolos

    $senha = '';

    if ($maiusculas){
        //  verifica se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($ma);
    }

    if ($minusculas){
        // verifica se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($mi);
    }

    if ($numeros){
        //  verifica se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($nu);
    }

    if ($simbolos){
        // verifica se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($si);
    }

    // verifica se a senha começa com simbolo e retorna a senha embaralhada sem começar com simbolo
    $senha = substr(str_shuffle($senha),0,$tamanho);
    if(strpos(substr($senha, 0, 3), $si) !== false) {
        gerar_senha($tamanho, $maiusculas, $minusculas, $numeros, $simbolos);
    }
    else{
        return $senha;
    }
}

echo gerar_senha(10,true,true, true, true);