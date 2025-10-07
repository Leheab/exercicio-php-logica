<?php

    function countStar($numero):string {
        $resultado = "";

        switch ($numero) {
            case 1:
                $resultado .= $mensagem = "Domingo";
                break;
            case 2:
                $resultado .= $mensagem = "Segunda-feira";
                break;
            case 3:
                $resultado .= $mensagem = "Terça-feira";
                break;
            case 4:
                $resultado .= $mensagem = "Quarta-feira";
                break;
            case 5:
                $resultado .= $mensagem = "Quinta-feira";
                break;
            case 6:
                $resultado .= $mensagem = "Sexta-feira";
                break;
            case 7:
                $resultado .= $mensagem = "Sabado";
                break;
            default:
                $resultado .= $mensagem = "Número inválido, por favor digite  um número de 1 a 7 para corresponder a um dia da semana.";
        }   
        $resultado = "Resultado: $mensagem";
        return $resultado;

    } 
?>