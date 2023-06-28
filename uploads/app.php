<?php

    header("Access-Control-Allow-Origin: *");
    require "../vendor/autoload.php";
    $router = new \Bramus\Router\Router();
    $dotenv = Dotenv\Dotenv::createImmutable("../");
    $dotenv->load();

    $router->get("/campers/{id}", function($id){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM campers WHERE idCamper = :ID");
        $res->bindParam("ID", $id);
        $res->execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });

    $router->get("/campers", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM campers");
        $res->execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });

    $router->put("/campers", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE campers SET nombreCamper = :NOMBRE, apellidoCamper = :APELLIDO, fechaNac = :FECHA, idReg = :IDREG WHERE idCamper = :ID");
        $res->bindParam("NOMBRE", $_DATA['nombreCamper']);
        $res->bindParam("APELLIDO", $_DATA['apellidoCamper']);
        $res->bindParam("FECHA", $_DATA['fechaNac']);
        $res->bindParam("IDREG", $_DATA['idReg']);
        $res->bindParam("ID", $_DATA['idCamper']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/campers", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO campers (nombreCamper, apellidoCamper, fechaNac, idReg) VALUES (:NOMBRE, :APELLIDO, :FECHA, :IDREG)");
        $res->bindParam("NOMBRE", $_DATA['nombreCamper']);
        $res->bindParam("APELLIDO", $_DATA['apellidoCamper']);
        $res->bindParam("FECHA", $_DATA['fechaNac']);
        $res->bindParam("IDREG", $_DATA['idReg']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->delete("/campers", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM campers WHERE idCamper = :ID");
        $res->bindParam("ID", $_DATA['idCamper']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->run();

?>