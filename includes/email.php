<?php
require_once __DIR__ . '/../config/config.php';

function enviarEmail($para, $assunto, $mensagem) {
    // Configurações adicionais de cabeçalho
    $headers = "From: " . EMAIL_FROM . "\r\n";
    $headers .= "Reply-To: " . EMAIL_FROM . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    
    // Adiciona um template HTML básico
    $mensagemFormatada = "
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background-color: #007bff; color: white; padding: 10px; text-align: center; }
                .content { padding: 20px; }
                .footer { margin-top: 20px; font-size: 12px; text-align: center; color: #777; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>CLTreino</h2>
                </div>
                <div class='content'>
                    {$mensagem}
                </div>
                <div class='footer'>
                    <p>Este é um e-mail automático, por favor não responda.</p>
                </div>
            </div>
        </body>
        </html>
    ";
    
    // Tenta enviar o email
    try {
        $envio = mail($para, $assunto, $mensagemFormatada, $headers);
        
        if (!$envio) {
            error_log("Falha ao enviar email para: $para");
            return false;
        }
        return true;
    } catch (Exception $e) {
        error_log("Erro no envio de email: " . $e->getMessage());
        return false;
    }
}