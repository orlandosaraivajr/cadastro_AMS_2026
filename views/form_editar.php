<h2 class="mb-3">Editar Aluno</h2>

<form action="editar.php" method="POST" class="bg-white p-4 rounded shadow-sm">

    <input type="hidden" name="id" value="<?php echo $dadosAluno['id']; ?>">

    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($dadosAluno['nome']); ?>" required>
    </div>

    <div class="mb-3">
        <label for="ra" class="form-label">RA</label>
        <input type="text" class="form-control" id="ra" name="ra" value="<?php echo htmlspecialchars($dadosAluno['ra']); ?>" required>
    </div>

    <div class="mb-3">
        <label for="curso" class="form-label">Curso</label>
        <input type="text" class="form-control" id="curso" name="curso" value="<?php echo htmlspecialchars($dadosAluno['curso']); ?>" required>
    </div>

    <button type="submit" class="btn btn-success">Atualizar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>

</form>
