<?php
include('conexao.php');
$idusuario = isset($_GET["idusuario"]) ? $_GET["idusuario"] : null;
$op = isset($_GET["op"]) ? $_GET["op"] : null;


try {
   
    $con = new PDO("mysql:host=$servidor;dbname=$bd", $usuario, $senha);

    if ($op == "del") {
        $sql = "delete  FROM  usuarios where idusuario= :idusuario";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":idusuario", $idusuario);
        $stmt->execute();
        header("Location:listarusuarios.php");
    }


    if ($idusuario) {
        //estou buscando os dados do usuario no BD
        $sql = "SELECT * FROM  usuarios where idusuario= :idusuario";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":idusuario", $idusuario);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_OBJ);
        //var_dump($usuario);
    }
    if ($_POST) {
        if ($_POST["idusuario"]) {
            $sql = "UPDATE usuario SET nome=:nome, email=:email,telefone=:telefone,senha=:senha WHERE idusuario =:idusuario";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":nome", $_POST["nome"]);
            $stmt->bindValue(":email", $_POST["email"]);
            $stmt->bindValue(":telefone", $_POST["telefone"]);
            $stmt->bindValue(":senha", $_POST["senha"]);
            $stmt->bindValue(":idusuario", $_POST["idusuario"]);
            $stmt->execute();
        } else {
            $sql = "INSERT INTO usuarios(nome,email,telefone,senha) VALUES (:nome,:email,:telefone,:senha)";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":nome", $_POST["nome"]);
            $stmt->bindValue(":email", $_POST["email"]);
            $stmt->bindValue(":telefone", $_POST["telefone"]);
            $stmt->bindValue(":senha", $_POST["senha"]);
            $stmt->execute();
        }
        header("Location:listarusuarios.php");
    }
} catch (PDOException $e) {
    echo "erro" . $e->getMessage();
}

include("header.php");
?>
<div class="container-fluid">
  <hr>
  <div class="row">
    <h4>Editar Usuários</h4>
  </div>
 <form method="POST">
  <div class="row">
     <div class="col-12 col-sm-6">
     <label for="exampleFormControlInput1" class=" fw-bold  form-label">Nome</label>
       <input type="text" class="form-control" name="nome" value="<?php echo isset($usuario) ? $usuario->nome : null ?>"><br>       
     </div>
     <div class="col-12 col-sm-6">
     <label for="exampleFormControlInput1" class="fw-bold  form-label">Email</label>
    <input type="text" class="form-control" name="email" value="<?php echo isset($usuario) ? $usuario->email : null ?>"><br>   
     </div>
     <div class="col-12 col-sm-6">
     <label for="exampleFormControlInput1" class="fw-bold  form-label">Telefone</label>
    <input type="text" class="form-control" name="telefone" value="<?php echo isset($usuario) ? $usuario->telefone : null ?>"><br>        
     </div>
     <div class="col-12 col-sm-6">
     <label for="exampleFormControlInput1" class="fw-bold  form-label">Senha</label>
    <input type="text"  class="form-control" name="senha" value="<?php echo isset($usuario) ? $usuario->senha : null ?>"><br>      
     </div>
   </div>
    <div class="container">
      <div class="row text-center">
      <div class="col-12 col-sm-4 py-2 ">
         <input type="hidden" name="idusuario" value="<?php echo isset($usuario) ? $usuario->idusuario : null ?>">
        <div class="d-grid gap-1"> 
          <input class="btn btn-success " type="submit">
        </div> 
      </div> 
    <div class="col-12 col-sm-4 py-2">
        <div class="d-grid gap-2">
           <a class="btn btn-primary " href="Page_one.php">Painel Principal</a>
        </div>
       </div> 
       <div class="col-12 col-sm-4 py-2">
        <div class="d-grid gap-2">
           <a class="btn btn-secondary " href="listarusuarios.php">Lista de Usuários</a>
        </div>
       </div>                 
     </div> 
    </div>     
    </form>
    </div>
<?php
include("footer.php")
?>
