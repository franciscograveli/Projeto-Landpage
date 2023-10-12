<?php
require './vendor/autoload.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';
require './vendor/phpmailer/phpmailer/src/Exception.php';
require_once './load-env.php';

    use PHPMailer\PHPMailer\PHPMailer;
    $Nome = getenv('MEU_NOME');
    $Email = getenv('MEU_EMAIL');
    $servidorSMTP = getenv('SERVIDOR_SMTP');
    $senha = getenv('MINHA_SENHA');
    $logo = getenv('LINK_LOGO_GIGABENS');
    $mailer = new Mailer($Email, $Nome, $servidorSMTP, $senha, $logo);

class Mailer {
    private $meuEmail;
    private $meuNome;
    private $servidorSMTP;
    private $senha;
    private $logo;

    public function __construct($meuEmail, $meuNome, $servidorSMTP, $senha, $logo) {
        $this->meuEmail = $meuEmail;
        $this->meuNome = $meuNome;
        $this->servidorSMTP = $servidorSMTP;
        $this->senha = $senha;
        $this->logo = $logo;
    }

    public function enviarEmail($nome, $email, $assunto, $cell, $mensagem) {
        $mail = new PHPMailer;

        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->SMTPDebug = 0; // 0 para desativar o modo de depuração
        $mail->Host = $this->servidorSMTP; // Endereço do servidor SMTP
        $mail->SMTPAuth = true; // Ativar autenticação SMTP
        $mail->Username = $this->meuEmail; // Seu endereço de e-mail
        $mail->Password = $this->senha; // Sua senha de e-mail
        $mail->SMTPSecure = 'ssl'; // TLS ou SSL
        $mail->Port = 465; // Porta do servidor SMTP (587 para TLS, 465 para SSL)

        // Configurações do e-mail
        $mail->CharSet = 'UTF-8';
        // Configurar o cabeçalho MIME
        $mail->addCustomHeader('MIME-Version: 1.0');
        $mail->addCustomHeader('Content-Type: text/html; charset=UTF-8');
        $mail->setFrom($this->meuEmail, $nome);
        $mail->addAddress($this->meuEmail, $this->meuNome);
        $mail->addReplyTo($this->meuEmail, $nome);
        $mail->isHTML(true); // Definir e-mail como HTML
        $mail->Subject = $assunto;
        // Para o corpo HTML do e-mail
        $mail->Body = '<html><head><meta charset="UTF-8"></head><body>
        <div style="background-color: #002289; text-align: center; padding: 1.5rem  0; border-radius: 2rem;">
            <div >
                <img src=" ' . $this->logo . '" alt="Logo GigaBens" style="width: 250px; height: auto;">
            </div>
            <div >
               ' . $mensagem . '
            </div>
        </div>
           
        </body></html>';

        // Verificar se o e-mail foi enviado com sucesso
        if ($mail->send()) {
            return 'E-mail enviado com sucesso!';
        } else {
            return 'Erro ao enviar o e-mail: ' . $mail->ErrorInfo;
        }
    }
}
?>
