<!-- Botão para acionar modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
    Editar Desenvolvedor
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Editar Desenvolvedor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Formulário de edição -->
          <form method="POST" action="{{ route('developers.update', $developer->id) }}">
            @csrf
            @method('PUT')
            <!-- Campos do formulário -->
            <!-- Substitua os campos abaixo pelos campos da migração -->
            <div class="mb-3">
              <label for="name" class="form-label">Nome</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ $developer->name }}" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ $developer->email }}" required>
            </div>
            <!-- Outros campos da migração -->
            <!-- Botão de envio -->
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  