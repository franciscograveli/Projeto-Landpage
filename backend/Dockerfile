# Use a imagem base do PHP com Apache
FROM php:7.4-apache

# Defina o diretório de trabalho dentro do contêiner
WORKDIR /var/www/html

# Copie os arquivos do seu aplicativo PHP para o contêiner
COPY . .
# Instale as extensões PHP necessárias (exemplo: mysqli)
RUN docker-php-ext-install mysqli

# Se você precisar de outras extensões, adicione-as aqui

# Habilitar o módulo Apache para reescrever URLs (se necessário)
# RUN a2enmod rewrite

# Exponha a porta do servidor web (geralmente a porta 80)
EXPOSE 83

# Comando para iniciar o servidor web Apache
CMD ["apache2-foreground"]
