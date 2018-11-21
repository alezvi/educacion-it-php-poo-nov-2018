<?php

require 'src/Registration.php';

if (! empty($_POST)) {
    $registration = new Registration;

    try {
        $registration->setEmail($_POST['email']);
        $registration->setPassword($_POST['password']);
        echo $registration->save();
    } catch (InvalidArgumentException $e) {
        http_response_code($e->getCode());
        echo json_encode(['error' => 'Los datos son incorrectos']);
    } catch (InvalidPasswordException $e) {
        http_response_code($e->getCode());
        echo json_encode(['error' => 'El password no es valido']);
    }
}

require 'public/register.php';
