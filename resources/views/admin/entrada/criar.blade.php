<div class="modal fade modalcadastro" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Cadastro de Empresas</h4>
      </div>

      <form  class="form-horizontal formulariocadastro" method="POST">
        <div class="modal-body">
         <div class="form-group">
          <label class="control-label col-md-2" for="email">Nome :</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="nome" id="nome">
          </div>          
        </div>
        <div class="form-group">
          <label class="control-label col-md-2" for="email">Razão Social :</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="razao" id="razao">
          </div>          
        </div>
        <div class="form-group">
          <label class="control-label col-md-2" for="email">CNPJ :</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="cnpj" id="cnpj">
          </div>          
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" id="btncadastrar" class="btn btn-default">Cadastrar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </form>
  </div>
</div>
</div>