<h2 class="mb-3">Cadastrar Aluno</h2>

<form action="cadastrar.php" method="POST" class="bg-white p-4 rounded shadow-sm">

    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
    </div>

    <div class="mb-3">
        <label for="ra" class="form-label">RA</label>
        <input type="text" class="form-control" id="ra" name="ra" required>
    </div>

    <div class="mb-3">
        <label for="curso" class="form-label">Curso</label>
        <input type="text" class="form-control" id="curso" name="curso" required>
    </div>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>

</form>
