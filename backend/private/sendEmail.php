<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//Verificando  a solicitação GET

if($_GET){
    
// Criar um array associativo
$dados = [
    "status" => [0, ""],
];

// Tratamento de erros
$errors = [];

$nome = isset($_GET["nome"]) ? $_GET["nome"] : null;
if ($nome === null || empty($nome) || is_numeric($nome)) {
    $errors[] = "O campo nome é obrigatório.";
} 

$email = isset($_GET["email"]) ? $_GET["email"] : null;
if ($email === null || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "O campo email é inválido.";
}

$cell = isset($_GET["cell"]) ? $_GET["cell"] : null;
if ($cell === null || strlen($cell) < 8 || !preg_match("/^(?:\+?\d{0,3}\s?)?(?:\d{4,5}-?\d{4}|\(\d{2,4}\)\s?\d{4,5}-?\d{4})$/", $cell)) {
    $errors[] = "Por favor, insira um número de celular válido. (O número deve estar no formato local como '98862-6483' ou internacional como '+5532988626483'.)";
}






$placa = isset($_GET["placa"]) ? $_GET["placa"] : null;
if ($placa && !preg_match("/^[A-Z0-9]{7}$/", $placa)) {
    $errors[] = "O campo placa é inválido (deve conter 7 caracteres alfanuméricos em maiúsculas).";
}

$assunto = isset($_GET["assunto"]) ? $_GET["assunto"] : '';


$veiculo = isset($_GET["veiculo"]) ? $_GET["veiculo"] : '';

// Verifica se o parâmetro 'msg' foi enviado via GET
if (isset($_GET["msg"])) {
    // Remove espaços em branco do início e do final da string
    $msg = trim($_GET["msg"]);

    // Verifica se a mensagem está vazia ou é indefinida
    if (empty($msg)) {
        $errors[] = "Insira sua mensagem no campo mensagem.";
    }
}

// Fim do tratamento de erros

// Verificar se há erros
if (!empty($errors)) {
    $dados["status"] = [1, $errors[0]];
} else {

    // Criando Mensagens
    $mensagem = '<div style="display: inline-block; margin: 1rem;">';

    if (isset($veiculo) && !empty($veiculo)) {
        $mensagem .= '<p style="font-size: 20px; font-weight: bold; text-align: center; padding: 1rem 2rem; background-color: #000b2a; border-radius: 1rem; color: #FF7F00;">' . $veiculo . "</p>";
    }

    $mensagem .= '<p style="font-size: 20px; text-align: center; padding: .75rem 1.5rem; background-color: #ddd; border-radius: 2rem;">Cliente: ' . $nome . "</p>"
                . '<p style="font-size: 20px; text-align: center; padding: .75rem 1.5rem; background-color: #ddd; border-radius: 2rem;">Email: ' . $email . "</p>"
                . '<p style="font-size: 20px; text-align: center; padding: .75rem 1.5rem; background-color: #ddd; border-radius: 2rem;">Celular: ' . $cell . "</p>";

    if (isset($placa)) {
        $mensagem .= '<p style="font-size: 20px; text-align: center; padding: .75rem 1.5rem; background-color: #ddd; border-radius: 2rem;">Placa: ' . $placa . '</p>';
    }

    if(isset($msg) && !empty($msg)){
        $mensagem .= '<p style="max-width: 400px; font-size: 18px; text-align: center; padding: .75rem 1.5rem; background-color: #fafafa; border-radius: 1.75rem; color: #000b2a;">' . $msg . '</p>';
    }

    $mensagem .= '<a href="https://api.whatsapp.com/send?phone=' . $cell . '" style="margin-top: 2rem; margin-bottom: 2rem; text-decoration: none; font-size: 1rem; text-align: center; padding: 1rem 1.5rem; background-color: #25D366; border-radius: 2rem; color: #fff;">Contatar Pelo Whatsapp</a></div>';
    // Fim das mensagens

    include_once "./mailer.php";
    
    $enviado = $mailer->enviarEmail( $nome, $email, $assunto, $cell, $mensagem);
    $dados = ["status" => [0, $enviado]];
}

echo json_encode(["dados" => $dados]);

} else{
    echo $dados = ["status" => [1, "Requisição inválida"]];;
}

?>