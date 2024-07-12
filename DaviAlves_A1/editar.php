<?php
include 'Conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = Conexao::conectar();

    if ($conn) {
        $idFornecedor = htmlspecialchars($_POST['idFornecedor'], ENT_QUOTES, 'UTF-8');
        $razaoSocial = htmlspecialchars($_POST['razaoSocial'], ENT_QUOTES, 'UTF-8');
        $nomeFantasia = htmlspecialchars($_POST['nomeFantasia'], ENT_QUOTES, 'UTF-8');
        $cnpj = htmlspecialchars($_POST['cnpj'], ENT_QUOTES, 'UTF-8');
        $responsavel = htmlspecialchars($_POST['responsavel'], ENT_QUOTES, 'UTF-8');
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $ddd = htmlspecialchars($_POST['ddd'], ENT_QUOTES, 'UTF-8');
        $telefone = htmlspecialchars($_POST['telefone'], ENT_QUOTES, 'UTF-8');

        if ($email === false) {
            die("E-mail inválido!");
        }

        if (strlen($ddd) != 3 || !ctype_digit($ddd)) {
            die("DDD inválido!");
        }

        $sql = "UPDATE prova_final 
                SET razaoSocial = :razaoSocial, nomeFantasia = :nomeFantasia, cnpj = :cnpj, responsavel = :responsavel, email = :email, ddd = :ddd, telefone = :telefone
                WHERE idFornecedor = :idFornecedor";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idFornecedor', $idFornecedor);
        $stmt->bindParam(':razaoSocial', $razaoSocial);
        $stmt->bindParam(':nomeFantasia', $nomeFantasia);
        $stmt->bindParam(':cnpj', $cnpj);
        $stmt->bindParam(':responsavel', $responsavel);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':ddd', $ddd);
        $stmt->bindParam(':telefone', $telefone);

        if ($stmt->execute()) {
            echo "Registro atualizado com sucesso";
        } else {
            echo "Erro ao atualizar o registro: " . implode(", ", $stmt->errorInfo());
        }
    } else {
        echo "Erro ao conectar com o banco de dados.";
    }
}
?>