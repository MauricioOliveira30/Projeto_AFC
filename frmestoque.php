<?php
include('conexao.php');
$idproduto = isset($_GET["idproduto"]) ? $_GET["idproduto"] : null;
$op = isset($_GET["op"]) ? $_GET["op"] : null;

try {
    $servidor = "localhost";
    $usuario = "root";
    $senha = "1234";
    $bd = "bdsje";
    $con = new PDO("mysql:host=$servidor;dbname=$bd", $usuario, $senha);

    if ($op == "del") {
        $sql = "DELETE FROM estoque WHERE idproduto=:idproduto";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":idproduto", $idproduto);
        $stmt->execute();
        header("Location:listarestoque.php");
       exit;
    }

    if ($idproduto) {
        // Fetching product details
        $sql = "SELECT * FROM estoque WHERE idproduto= :idproduto";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":idproduto", $idproduto);
        $stmt->execute();
        $estoque = $stmt->fetch(PDO::FETCH_OBJ);
    }

    if ($_POST) {
        if ($_POST["idproduto"]) {
            $sql = "UPDATE estoque SET entrada=:entrada, saida=:saida, estoque=:estoque, mes=:mes WHERE idproduto =:idproduto";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":entrada", $_POST["entrada"]);
            $stmt->bindValue(":saida", $_POST["saida"]);
            $stmt->bindValue(":estoque", $_POST["estoque"]);
            $stmt->bindValue(":mes", $_POST["mes"]);
            $stmt->bindValue(":idproduto", $_POST["idproduto"]);
        
            $stmt->execute();
        } else {
            $sql = "INSERT INTO estoque (entrada, saida, estoque, mes,idproduto) VALUES (:entrada, :saida, :estoque, :mes,:idproduto)";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":entrada", $_POST["entrada"]);
            $stmt->bindValue(":saida", $_POST["saida"]);
            $stmt->bindValue(":estoque", $_POST["estoque"]);
            $stmt->bindValue(":mes", $_POST["mes"]);
            $stmt->bindValue(":idproduto", $_POST["idproduto"]);
            $stmt->execute();
        }
        header("Location:listarestoque.php");
        exit;
    }
} catch (PDOException $e) {
    echo "erro" . $e->getMessage();
}

include("header.php");
?>
<div class="container-fluid">
    <hr>
    <h3>Cadastro de Estoque</h3>
    <hr>
    <form method="POST">
        <div class="row">
            <div class="col-12 col-sm-3">
                Entrada
                <input type="number" name="entrada" value="<?php echo isset($estoque) ? $estoque->entrada : null ?>"><br>
            </div>
            <div class="col-12 col-sm-3">
                Saída
                <input type="number" name="saida" value="<?php echo isset($estoque) ? $estoque->saida : null ?>"><br>
            </div>
            <div class="col-12 col-sm-2">
                Estoque
                <input type="number" name="estoque" value="<?php echo isset($estoque) ? $estoque->estoque : null ?>"><br>
            </div>
            <div class="col-12 col-sm-4">
                Mês
                <input type="text" name="mes" value="<?php echo isset($estoque) ? $estoque->mes : null ?>"><br>
            </div>
        </div>
       
        
        <input class="btn btn-success" type="submit" value="Cadastrar">
    </form>
    <a href="listarestoque.php"><button type="button" class="btn btn-success">Voltar</button></a>
</div>
<?php
include("footer.php");
?>