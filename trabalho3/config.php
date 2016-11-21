<?php
$senha    = "poker.10";

$connection = new mysqli("localhost", "root", $senha);

if (!$connection) {
    echo mysqli_connect_error();
} else {
    $criarBanco = "CREATE DATABASE hospital";
    if (mysqli_query($connection, $criarBanco)) {
        $sql = "CREATE TABLE usuarios (
			nome varchar(50),
			cpf varchar(12) NOT NULL,
			usuario varchar(10),
			senha varchar(10),
			admin bool,
			primary key(cpf)
			)";

        $sql1 = "CREATE TABLE paciente (
			nome varchar(50),
			nascimento varchar(10),
			cpf int,
			telefone varchar(15)  ,
			email varchar(30),
			tipoSanguineo varchar(2),
			plano varchar(100),
			alergias varchar(200),
			prontuarios varchar(500) 
			)";

        $admin = "INSERT INTO usuarios VALUES (
									'admin',
									'123456789',
									'admin',
									'admin',
									1
									)";
        
        $teste = mysqli_query(new mysqli("localhost", "root", $senha, "hospital"), $sql);
        $teste2 = mysqli_query(new mysqli("localhost", "root", $senha, "hospital"), $sql1);
        $teste3 = mysqli_query(new mysqli("localhost", "root", $senha, "hospital"), $admin);
        
        if ($teste == FALSE) {
            echo "Erro ao criar tabela usuarios" . "<br/>";
        }
        if ($teste2 == FALSE) {
            echo "Erro ao criar tabela paciente" . "<br/>";
        } 
         if ($teste3 == FALSE) {
            echo "Erro ao adicionar administrador" . "<br/>";
        } else {
            echo "Configurações realizadas com sucesso, acesse raiz do site." . "<br/>";
        }
    }
}

$connection->close();
?>