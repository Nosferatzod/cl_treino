# Usa a imagem oficial do PHP com CLI (Command Line Interface)
FROM php:8.2-cli

# Define o diretório de trabalho dentro do container
WORKDIR /app

# Copia todos os arquivos do projeto para o container
COPY . .

# Expõe a porta 10000 (a que a Render usa por padrão)
EXPOSE 10000

# Comando para iniciar o servidor embutido do PHP
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
