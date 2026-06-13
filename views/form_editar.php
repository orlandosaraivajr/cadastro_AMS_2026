<h2 class="mb-3">Editar Aluno</h2>

<?php if (!empty($erro)): ?>
    <div class="alert alert-danger">
        <?php echo htmlspecialchars($erro); ?>
    </div>
<?php endif; ?>

<form action="editar.php" method="POST" class="bg-white p-4 rounded shadow-sm">

    <input type="hidden" name="id" value="<?php echo $dadosAluno['id']; ?>">

    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($dadosAluno['nome']); ?>" required>
    </div>

    <div class="mb-3">
        <label for="ra" class="form-label">RA</label>
        <input type="text" class="form-control" id="ra" name="ra" value="<?php echo htmlspecialchars($dadosAluno['ra']); ?>" readonly>
        <div class="form-text">O RA é sequencial e não pode ser alterado nesta tela.</div>
    </div>

    <div class="mb-3">
        <label for="curso" class="form-label">Curso</label>
        <input type="text" class="form-control" id="curso" name="curso" value="<?php echo htmlspecialchars($dadosAluno['curso']); ?>" required>
    </div>

    <button type="submit" class="btn btn-success">Atualizar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>

</form>
