<div class="modal fade modalcadastro" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Cadastro de Exames</h4>
      </div>

      <form  class="form-horizontal formulariocadastro" method="POST">
        <div class="modal-body">
         <div class="form-group">
          <label class="control-label col-md-2" for="nome">Nome:</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="nome" id="nome">
          </div>          
        </div>
        <div class="form-group">
          <label class="control-label col-md-2" for="sigla">Sigla:</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="sigla" id="sigla">
          </div>          
        </div>
        <div class="form-group">
          <label class="control-label col-md-2" for="duracao">Duração:</label>
          <div class="col-md-10">
            <select class="form-control" name="duracao">
              <option value="30">1 Mês</option>
              <option value="90">3 Meses</option>
              <option value="180">6 Meses</option>
              <option value="365">12 Meses / 1 ano</option>
              <option value="540">18 Meses</option>
              <option value="730">24 Meses / 2 anos</option>
              <option value="1095">36 Meses / 3 anos</option>
              <option value="1460">48 Meses / 4 anos</option>
              <option value="1825">56 Meses / 5 anos</option>
            </select>
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