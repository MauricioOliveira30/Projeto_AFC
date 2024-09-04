<?php
include('conexao.php');

try {
    $sql = "SELECT * from produtos";
    $qry = $con->query($sql);
    $produto = $qry->fetchAll(PDO::FETCH_OBJ);
    //echo "<pre>";
    //print_r($clientes);
    //die();
} catch (PDOException $e) {
    echo $e->getMessage();
}
include("header.php");
?>

<div class="container-fluid">
    <hr>
    <h3>Lista de produtos</h3>
    <hr>
    <table border=1>
        <thead>
            <tr>
                <!-- On tables -->
                <table class="table table-striped-columns">
                <th>Id do Produto</th>
                <th>Descriçao do Produto</th>
                <th>Unidade de Medida</th>
                <th colspan=2>Ações</th>

<!-- On rows -->


<!-- On cells (`td` or `th`) -->

            <?php foreach ($produto as $produtos) { ?>
                <tr>
                    <td><?php echo $produtos->idproduto ?></td>
                                        <td><?php echo $produtos->descproduto?></td>
                    <td><?php echo $produtos-> idunimed ?></td>
<td><a href="frmprodutos.php?idproduto=<?php echo $produtos->idproduto ?>"><svg height="24" version="1.1" width="24" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"><g transform="translate(0 -1028.4)"><g transform="matrix(1.0607 1.0607 -1.0607 1.0607 1146.8 34.926)"><path d="m-63 1003.4v11.3 0.7 1l2 2 2-2v-1-0.7-11.3h-4z" fill="#ecf0f1"/><path d="m-61 1003.4v15l2-2v-1-0.7-11.3h-2z" fill="#bdc3c7"/><rect fill="#e67e22" height="11" width="4" x="-63" y="1004.4"/><path d="m-61 1000.4c-1.105 0-2 0.9-2 2v1h4v-1c0-1.1-0.895-2-2-2z" fill="#7f8c8d"/><g transform="translate(-7,1)"><path d="m-55.406 1016 1.406 1.4 1.406-1.4h-1.406-1.406z" fill="#34495e"/><path d="m-54 1016v1.4l1.406-1.4h-1.406z" fill="#2c3e50"/></g><path d="m-61 1000.4c-1.105 0-2 0.9-2 2v1h2v-3z" fill="#95a5a6"/><rect fill="#d35400" height="11" width="2" x="-61" y="1004.4"/></g></g></svg>
<td><a href="frmprodutos.php?op=del&idproduto=<?php echo  $produtos->idproduto ?>"><svg height="24" version="1.1"width="24"xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:#0e7cc9;}.cls-2{fill:#47a6e3;}.cls-3{fill:#6c2e7c;}</style></defs><g id="Icons"><path class="cls-1" d="M20,5V20a3,3,0,0,1-3,3H7a3,3,0,0,1-3-3V5Z"/><path class="cls-2" d="M20,5V15a3,3,0,0,1-3,3H7a3,3,0,0,1-3-3V5Z"/></g><g data-name="Layer 4" id="Layer_4"><path class="cls-3" d="M13,0H11A3,3,0,0,0,8,3V4H2A1,1,0,0,0,2,6H3V20a4,4,0,0,0,4,4H17a4,4,0,0,0,4-4V6h1a1,1,0,0,0,0-2H16V3A3,3,0,0,0,13,0ZM10,3a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V4H10Zm9,17a2,2,0,0,1-2,2H7a2,2,0,0,1-2-2V6H19Z"/><path class="cls-3" d="M12,9a1,1,0,0,0-1,1v8a1,1,0,0,0,2,0V10A1,1,0,0,0,12,9Z"/><path class="cls-3" d="M15,18a1,1,0,0,0,2,0V10a1,1,0,0,0-2,0Z"/><path class="cls-3" d="M8,9a1,1,0,0,0-1,1v8a1,1,0,0,0,2,0V10A1,1,0,0,0,8,9Z"/></g></svg>
</svg></a></td>


                </tr>
            <?php } ?>
        </tbody>
    </table>
    <!--         <div class="d-grid gap-2 d-md-block">
             <input class="btn btn-success" type="submit" value="Cadastrar"> 
               <button class="btn btn-dark" type="button">
                   <a class="text-white text-decoration-none" href="listarprodutos.php">Listar Produtos</a>
               </button>  
               <button class="btn btn-secondary" type="button">
                   <a class="text-white text-decoration-none" href="Page_one.php">Área Principal</a>
               </button>                 
            </div>  -->
<div class="d-grid gap-2 d-md-block">
    <button class="btn btn-success" type="submit">
        <a class="text-white text-decoration-none" href="frmprodutos.php" >Cadastrar Produto</a>
    </button>
    <button class="btn btn-secondary" type="submit">
    <a class="text-white text-decoration-none" href="Page_one.php">Voltar</a>
    </button>
 </div>
</div>    
<?php
include("footer.php");
?>