<h2 class="mb-3">Cadastrar Aluno</h2>

<?php if (!empty($erro)): ?>
    <div class="alert alert-danger">
        <?php echo htmlspecialchars($erro); ?>
    </div>
<?php endif; ?>

<form action="cadastrar.php" method="POST" class="bg-white p-4 rounded shadow-sm">

    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($valores['nome'] ?? ''); ?>" required>
    </div>

    <div class="mb-3">
        <label for="ra" class="form-label">RA</label>
        <input type="text" class="form-control" id="ra" name="ra" value="<?php echo htmlspecialchars($valores['ra'] ?? ''); ?>" inputmode="numeric" pattern="[0-9]+" maxlength="20" autocomplete="off" required>
        <div class="form-text">Somente números. O próximo RA esperado é <?php echo htmlspecialchars($proximoRa ?? ''); ?>.</div>
    </div>

    <div class="mb-3">
        <label for="curso" class="form-label">Curso</label>
        <input type="text" class="form-control" id="curso" name="curso" value="<?php echo htmlspecialchars($valores['curso'] ?? ''); ?>" required>
    </div>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>

</form>
