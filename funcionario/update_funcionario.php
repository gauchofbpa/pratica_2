<?php
    include '../banco_de_dados/db.php';
    $id_funcionario = $_GET['id_funcionario'];
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $sql = "UPDATE funcionario SET nome = '$name', cpf = '$cpf', email = '$email', telefone = '$telefone' WHERE id_funcionario = '$id_funcionario'"; 
        if($conn -> query($sql) === TRUE) {
            echo "Registro atualizado com sucesso";
        } else {
            echo "Erro: " . $sql . "<br>". $conn -> error;
        }
        $conn -> close();
        header ("Location: read_funcionario.php");
        exit();
    }
    $sql = "SELECT * FROM funcionario WHERE id_funcionario = '$id_funcionario'";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilo/styles.css">
    <title>Gerenciamento de Solicitações</title>
</head>
<body>
    <h1>Atualizar o cadastro do cliente</h1>
    <form method="POST" action="update_funcionario.php?id_funcionario=<?php echo $row['id_funcionario'];?>">
        <label for="name">Nome:</label>
        <input type="text" name="name" value="<?php echo $row['nome'];?>" required>
        <br> <br>
        <label for="cpf">cpf:</label>
        <input type="number" name="cpf" value="<?php echo $row['cpf'];?>" required>
        <br> <br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['email'];?>" required>
        <br> <br>
        <label for="telefone">Telefone:</label>
        <input type="number" name="telefone" value="<?php echo $row['telefone'];?>" required>
        <br> <br>
        <input type="submit" value="Atualizar">
    </form>
    <a href="read_funcionario.php">Voltar</a>
</body>
</html>