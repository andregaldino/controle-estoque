<div class="modal fade modalcadastro" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Cadastro de Acidentes</h4>
      </div>

      <form  class="form-horizontal formulariocadastro" method="POST">
        <div class="modal-body">
         <div class="form-group">
          <label class="control-label col-md-2" for="descricao">Descrição:</label>
          <div class="col-md-10">
            <textarea class="form-control" name="descricao" id="descricao"></textarea>
          </div>          
        </div>
        <div class="form-group">
          <label class="control-label col-md-2" for="procedimento">Procedimento Realizado:</label>
          <div class="col-md-10">
            <textarea class="form-control" name="procedimento" id="procedimento"></textarea>
          </div>          
        </div>
        <div class="form-group">
          <label class="control-label col-md-2">Tipo de Acidente:</label>
          <div class="col-md-10">
            <select class="form-control" name="tipo_id">
              @forelse($tipos as $tipo)
                <option value="{{$tipo->id}}">{{$tipo->nome}}</option>
              @empty
                <option value="0">Selecione um tipo</option>
              @endforelse
              
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-2" >Funcionarios Envolvidos:</label>
          <div class="col-md-10">
            <select class="form-control" multiple name="funcionario_id[]">
              @forelse($funcionarios as $funcionario)
                <option value="{{$funcionario->id}}">{{$funcionario->nome}}</option>
              @empty
                <option value="0">Selecione um funcionario</option>
              @endforelse
              
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