<?php

session_start();

$_SESSION['status'] = 0;

$connection = mysqli_connect("localhost", "root", "poker.10", "hospital");


if (!$connection) {
    echo "Erro: " . mysqli_connect_error();
} else {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $user = mysqli_query($connection, "SELECT usuario, senha , admin , nome  FROM  usuarios");

    if (mysqli_num_rows($user) > 0) {
        while ($teste = mysqli_fetch_assoc($user)) {
            if ($teste["usuario"] == $usuario && $teste["senha"] == $senha && $teste["admin"] == 1) {
                echo "admin";
                header("Location: userAdmin.php");
                $_SESSION['status'] = TRUE;
                $_SESSION['admin'] = $teste["admin"];
                $_SESSION['nome'] = $teste["nome"];
                exit();
            } else if ($teste["usuario"] == $usuario && $teste["senha"] == $senha && $teste["admin"] == 0) {
                echo "comum";
                header("Location: userComum.php");
                $_SESSION['status'] = TRUE;
                $_SESSION['admin'] = $teste["admin"];
                $_SESSION['nome'] = $teste["nome"];
                exit();
            } else {
                echo "Usuario ou senha inválidos";
            }
        }
    }
}
mysqli_close($connection);
?>