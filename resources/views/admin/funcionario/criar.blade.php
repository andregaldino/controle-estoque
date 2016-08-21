<div class="modal fade modalcadastro" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Cadastro de Funcionario</h4>
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
          <label class="control-label col-md-2" for="email">CPF :</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="cpf" id="cpf">
          </div>          
        </div>
        <div class="form-group">
          <label class="control-label col-md-2" for="email">Empresa :</label>
          <div class="col-md-10">
            <select class="form-control" name="empresa">
              @if(count($empresas)>0)
                @foreach($empresas as $empresa)
                  <option value="{{ $empresa->id }}">{{ $empresa->nome }}</option>
                @endforeach
              @else
                <option value="0">Selecione</option>
              @endif
            </select>
          </div>          
        </div>
        <div class="form-group">
          <label class="control-label col-md-2" for="email">Cargo :</label>
          <div class="col-md-10">
            <select class="form-control" name="cargo">
              @if(count($cargos)>0)
                @foreach($cargos as $cargo)
                  <option value="{{ $cargo->id }}">{{ $cargo->nome }}</option>
                @endforeach
              @else
                <option value="0">Selecione</option>
              @endif
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