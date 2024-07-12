<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = Conexao::conectar();

    if ($conn) {
        $idFornecedor = htmlspecialchars($_POST['idFornecedor'], ENT_QUOTES, 'UTF-8');

        $sql = "DELETE FROM prova_final WHERE idFornecedor = :idFornecedor";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idFornecedor', $idFornecedor);

        if ($stmt->execute()) {
            echo "Registro excluído com sucesso";
        } else {
            echo "Erro ao excluir o registro: " . implode(", ", $stmt->errorInfo());
        }
    } else {
        echo "Erro ao conectar com o banco de dados.";
    }
}
?>