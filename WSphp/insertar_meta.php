<?php
/**
 * Insertar una nueva meta en la base de datos
 */

require 'Meta.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Insertar meta
    $retorno = Meta::insert(
        $body['titulo'],
        $body['descripcion'],
        $body['fechaLim'],
        $body['categoria'],
        $body['prioridad']);

    if ($retorno) {
        // Código de éxito
        print json_encode(
            array(
                'estado' => '1',
                'mensaje' => 'Creación éxitosa')
        );
    } else {
        // Código de falla
        print json_encode(
            array(
                'estado' => '2',
                'mensaje' => 'Creación fallida')
        );
    }
}
