<div class="modal fade" id="maddProduto" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Cadastro de Equipamento de Proteção Individual</h4>
      </div>

      <form  class="form-horizontal" id="faddProduto" method="POST">
        <div class="modal-body">
         <div class="form-group">
          <label class="control-label col-md-2" for="nome">Nome :</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="nome" id="nome">
          </div>          
        </div>
        <div class="form-group">
          <label class="control-label col-md-2" for="medida">Tamanho :</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="medida" id="medida">
          </div>          
        </div>
        <div class="form-group">
          <label class="control-label col-md-2" for="ca">CA :</label>
          <div class="col-md-10">
            <input type="number" class="form-control" name="ca" id="ca">
          </div>          
        </div>

        <div class="form-group">
          <label class="control-label col-md-2" for="min">Minimo para Lembrete :</label>
          <div class="col-md-10">
            <input type="number" class="form-control" name="min" id="min">
          </div>          
        </div>

        <div class="form-group">
          <label class="control-label col-md-2" for="categoria">Categoria :</label>
          <div class="col-md-10">
            <select class="form-control" name="categoria" id="categoria">
              @if(count($categorias)>0)
                @foreach($categorias as $categoria)
                  <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
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