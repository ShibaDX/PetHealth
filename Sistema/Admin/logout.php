<?php
//Destrói as variáveis da sessão
session_start();
session_unset();
session_destroy();

//Redireiona para o login
header("location: ../index.php");