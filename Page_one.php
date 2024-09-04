
<?php
  include("header.php");
 ?>
          <div class="row border bg-light text-center">
                <h4 class="py-3">Área Principal</h4>
                <h5>Escolha a Opção Abaixo:</h5>
          </div>        
        </div>         
       <div class="container area-principal">
         <div class="row my-2">
         <h2>Cadastros</h2>
          <hr>   
         <div class="row text-center">      
          <div class="col-sm-4 my-1">
            <a href="frmusuarios.php" class="btn btn-primary btn-lg" role="button" aria-pressed="true">Cadastro de Usuário</a>           
          </div>
          <div class="col-sm-4 my-1">
             <a href="frmprodutos.php" class="btn btn-secondary btn-lg" role="button" aria-pressed="true">Cadastro de Produtos</a>                
          </div>
           <div class="col-sm-4 my-1">
              <a href="frmestoque.php" class="btn btn-success btn-lg" role="button" aria-pressed="true">Cadastro de Estoque</a>   
           </div>
         </div>
         </div> 
       </div>
     </div> 
<div class="container">
  <div class="row">
    <h2> Relatórios</h2>
    <hr>
  </div> 
  <br>
  <div class="row text-center">
    <div class="col-sm-4 my-1">
    <a href="listarusuarios.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Listar Usuários</a>
    </div>
    <div class="col-sm-4 my-1">
    <a href="listarprodutos.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Listar Produtos</a>
    </div>
    <div class="col-sm-4 my-1">
    <a href="listarestoque.php" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Listar Estoque</a>
    </div>
  </div>
</div>
 <br>
 <?php
  include("footer.php");
 ?>