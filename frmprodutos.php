    <?php
include('conexao.php');
    $idproduto = isset($_GET["idproduto"]) ? $_GET["idproduto"] : null;
    $op = isset($_GET["op"]) ? $_GET["op"] : null;


    try {
        
        $con = new PDO("mysql:host=$servidor;dbname=$bd", $usuario, $senha);

        if ($op == "del") {
            $sql = "delete  FROM produtos where idproduto=:idproduto";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":idproduto", $idproduto);
            $stmt->execute();
            header("Location:listarprodutos.php");
        }


        if ($idproduto) {
            //estou buscando os dados do cliente no BD
            $sql = "SELECT * FROM  produtos
            where idproduto= :idproduto";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":idproduto", $idproduto);
            $stmt->execute();
            $produto = $stmt->fetch(PDO::FETCH_OBJ);
            //var_dump($cliente);
        }
        if ($_POST) {
            if ($_POST["idproduto"]) {
                $sql = "UPDATE produtos SET descproduto=:descproduto, idunimed=:idunimed WHERE idproduto =:idproduto";
                $stmt = $con->prepare($sql);
               
                $stmt->bindValue(":descproduto", $_POST["descproduto"]);
                $stmt->bindValue(":idunimed", $_POST["idunimed"]);
                $stmt->bindValue(":idproduto", $_POST["idproduto"]);
                $stmt->execute();
            } else {
                $sql = "INSERT INTO produtos(descproduto,unidmed) VALUES (:descproduto,:unidmed)";
                $stmt = $con->prepare($sql);
        
                $stmt->bindValue(":descproduto", $_POST["descproduto"]);
                $stmt->bindValue(":unidmed", $_POST["idunimed"]);
                $stmt->execute();
            }
            header("Location:listarprodutos.php");
        }
    } catch (PDOException $e) {
        echo "erro" . $e->getMessage();
    }


 include("header.php");
    ?>
     <div class="container-fluid">
        <hr>
        <div class="row">
        <h3>Cadastro de produtos</h3>
        <hr>
        <form method="POST">
        <div class="container">   
         <div class="col-12 col-sm-6">
        <label for="FormControlInput1" class=" fw-bold  form-label">Descrição do produtos</label>   
         </div>   
         <div class="col-12 col-sm-6">
         <input class="form-control" type="text" name="descproduto" value="<?php echo isset($produtos)? $produtos->descproduto : null ?>">            
         </div>   
         </div> 
         <div class="container">
             <div class="col-12 col-sm-6">
                <label for="FormControlInput2" class=" fw-bold  form-label">Unidade de Medida</label> 
             </div>
             <div class="col-12 col-sm-6">
           <input  class="form-control" id="ium"type="text"list="listaum" name="idunimed" value="<?php echo isset($produtos) ? $produtos->idunimed : null ?>">
            <datalist id="listaum">
                <option value="Kilograma">KG</option>
                <option value="Grama">G</option>
                <option value="Metro">M</option>
                <option value="Litro">L</option>
            </datalist>                 
             </div>
         </div>     
          <div class="container">
              <div class="col-12 col-sm-6 py-2">
                 <input type="hidden" name="idproduto" value="<?php echo isset($produtos) ? $produtos->idproduto : null ?>">              
              </div>
             <div class="d-grid gap-2 d-md-block">
             <input class="btn btn-success" type="submit" value="Cadastrar"> 
               <button class="btn btn-dark" type="button">
                   <a class="text-white text-decoration-none" href="listarprodutos.php">Listar Produtos</a>
               </button>  
               <button class="btn btn-secondary" type="button">
                   <a class="text-white text-decoration-none" href="Page_one.php">Área Principal</a>
               </button>                 
            </div>
          </div>      
        </form>
       </div> 
    </div>
    <br>
    <br>
<?php
  include("footer.php");
 ?>