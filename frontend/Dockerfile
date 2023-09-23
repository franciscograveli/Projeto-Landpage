# Use uma imagem base com Node.js
FROM node:14

# Defina o diretório de trabalho dentro do contêiner
WORKDIR /app

# Copie os arquivos do aplicativo para o contêiner
COPY . .

# Instale as dependências
RUN npm install

# Inicialize o aplicativo
CMD ["npm", "run", "dev"]
