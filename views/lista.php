<h2 class="mb-3">Alunos Cadastrados</h2>

<?php if (isset($_GET['msg'])): ?>
    <div class="alert alert-success">
        <?php
        if ($_GET['msg'] == 'cadastrado') echo 'Aluno cadastrado com sucesso!';
        if ($_GET['msg'] == 'atualizado') echo 'Aluno atualizado com sucesso!';
        if ($_GET['msg'] == 'excluido') echo 'Aluno excluído com sucesso!';
        ?>
    </div>
<?php endif; ?>

<table class="table table-striped table-bordered bg-white">
    <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>RA</th>
            <th>Curso</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($alunos) > 0): ?>
            <?php foreach ($alunos as $linha): ?>
                <tr>
                    <td><?php echo $linha['id']; ?></td>
                    <td><?php echo htmlspecialchars($linha['nome']); ?></td>
                    <td><?php echo htmlspecialchars($linha['ra']); ?></td>
                    <td><?php echo htmlspecialchars($linha['curso']); ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $linha['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
                        <a href="excluir.php?id=<?php echo $linha['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este aluno?');">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" class="text-center">Nenhum aluno cadastrado.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
