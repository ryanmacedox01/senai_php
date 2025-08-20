<?php
    session_start();
    if (!isset($_SESSION['pessoas'])) {
        $_SESSION['pessoas'] = [];
    }
    if (empty($_SESSION['pessoas'])) {
        $dados = json_decode(file_get_contents("pessoas.json"), true);
        $_SESSION['pessoas'] = $dados;
    }
    $id_edicao = null;
    $nome_edicao = '';
    $r1_edicao = '';
    $r2_edicao = '';
    $r3_edicao = '';
    $r4_edicao = '';
    $r5_edicao = '';
    $r6_edicao = '';
    $r7_edicao = '';
    $r8_edicao = '';
    $r9_edicao = '';
    $r10_edicao = '';
    $modo_edicao = false;
    //coração do CRUD
    //DELETE via GET
    if (isset($_GET['acao']) && $_GET['acao'] == 'deletar' && isset($_GET['id'])) {
        $id_para_deletar = $_GET['id'];
        foreach ($_SESSION['pessoas'] as $indice => $pessoa) {
            if ($pessoa['id'] == $id_para_deletar) {
                unset($_SESSION['pessoas'][$indice]);
                break;
            }
        }
        header('Location: index.php');
        exit;
    }
    //Preparar a edição
    if (isset($_GET['acao']) && $_GET['acao'] == 'editar' && isset($_GET['id'])) {
        $id_para_editar = $_GET['id'];
        foreach ($_SESSION['pessoas'] as $pessoa) {
            if ($pessoa['id'] == $id_para_editar) {
                $id_edicao = $pessoa['id'];
                $nome_edicao = $pessoa['nome'];
                $r1_edicao = $pessoa['r1'];
                $r2_edicao = $pessoa['r2'];
                $modo_edicao = true; //ativa a edicao no form
                break;
            }
        }
    }
    //criar e atualizar via POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $r1 = $_POST['r1'];
        $r2 = $_POST['r2'];
        $r3 = $_POST['r3'];
        $r4 = $_POST['r4'];
        $r5 = $_POST['r5'];
        $r6 = $_POST['r6'];
        $r7 = $_POST['r7'];
        $r8 = $_POST['r8'];
        $r9 = $_POST['r9'];
        $r10 = $_POST['r10'];
        //atualizar
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $id_para_atualizar = $_POST['id'];
            foreach ($_SESSION['pessoas'] as $indice => $pessoa) {
                if ($pessoa['id'] == $id_para_atualizar) {
                    $_SESSION['pessoas'][$indice]['nome'] = $nome;
                    $_SESSION['pessoas'][$indice]['r1'] = $r1;
                    $_SESSION['pessoas'][$indice]['r2'] = $r2;
                    break;
                }
            }
        }
        //criar
        else {
            $nova_pessoa = [
                'id' => uniqid(),
                'nome' => $nome,
                'r1' => $r1,
                'r2' => $r2
            ];
            $_SESSION['pessoas'][] = $nova_pessoa;
        }
        header('Location: index.php');
        exit;
    }
?>
<DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>CRUD - PHP/Array</title>
            <style>
                body { font-family: Arial, sans-serif; margin: 20px; }
                h1, h2 {color: #333; }
                .container { max-width: 800px; margin: auto; }
                form { margin-bottom: 20px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
                form div { margin-bottom: 10px; }
                label { display: block; margin-bottom: 5px; }
                input[type="text"], input[type="r1"] { width: calc(100% - 16px); padding: 8px; border: 1px solid #ccc; border-radius: 3px; }
                button { padding: 10px 15px; background-color: #28a745; color: white; border: none; border-radius: 3px; cursor: pointer; }
                button.update { background-color: #007bff; }
                table { width: 100%; border-collapse: collapse; }
                th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                th { background-color: #f2f2f2; }
                a { color: #007bff; text-decoration: none; }
                a.delete { color: #dc3545; margin-left: 10px; }
            </style>
        </head>
        <body>
            <div class="container">
                <h1>Formulário SENAI</h1>
                <form action= "index.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id_edicao; ?>">
                    <div>
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome_edicao); ?>" required>
                    </div>
                    <div>
                        <label for="r1">Você conhece o SENAI?</label>
                        <input type="r1" id="r1" name="r1" value="<?php echo htmlspecialchars($r1_edicao); ?>" required>
                    </div>
                    <div>
                        <label for="r2">Como você conheceu o SENAI?</label>
                        <input type="text" id="r2" name="r2" value="<?php echo htmlspecialchars($r2_edicao); ?>" required>
                    </div>
                    <div>
                        <?php if ($modo_edicao): ?>
                            <button type="submit" class="update">Atualizar pessoa</button>
                        <?php else: ?>
                            <button type="submit">Salvar</button>
                        <?php endif; ?>
                    </div>
                </form>
                <a href="index.php">Salvar respostas...</a>
            </div>
        </body>
    </html>