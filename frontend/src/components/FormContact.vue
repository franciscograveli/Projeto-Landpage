<template>
    
    <div class="form">
      <form action="POST" id="form">
        <h1>Aguardamos seu Contato!&#x1F609;</h1>
        <div id="identificacao">
            <input type="text" id="nome" v-model="dados.nome" :v-bind="dados.nome" placeholder="Insira seu nome..." required>
            <input type="email" id="email" v-model="dados.email" :v-bind="dados.email" placeholder="Insira seu email..." required>
            <input type="text" id="celular" v-model="dados.cell" :v-bind="dados.cell" placeholder="Insira seu melhor celular..." required maxlength="11">
        </div>
        <div id="textarea">
            <textarea name="msg" id="msg" cols="30" rows="10" v-model="dados.msg" :v-bind="dados.msg" placeholder="Insira sua mensagem..."></textarea>
        </div>
         <input @click="enviar($event)" type="button" value="Entrar em Contato" >
      </form>
    </div>
 
</template>

<script>
import Swal from 'sweetalert2';
import axios from 'axios';

export default{
    name: 'FormContact',
    data(){
        return{
          dados: {
            nome:  null,
            email: null,
            cell: null,
            msg: null,
            assunto: 'Contato'
          }
        }
    },
    methods:{
      enviar(event) {
        event.preventDefault();
        let preenchido = true;

        const dadosAux = new Map(Object.entries(this.dados));
        

        for (const [key, value] of dadosAux) {
        if (!this.verificar(value, key)) {
            preenchido = false;
            break; 
        }
        }

        if (preenchido) {
        this.buscarDados();
        }
    },
    verificar(value, key) {
        if (!value) {
        let fieldName = key === 'cell' ? 'celular' : key;
        fieldName = fieldName.toUpperCase();
        Swal.fire({
            icon: 'warning',
            title: 'Preencha todos os campos!',
            text: `Preencha o campo: ${fieldName}`,
            showConfirmButton: true,
            confirmButtonText: 'Ok',
            confirmButtonColor: 'var(--azul)',
        });
        return false;
        } else {
        return true;
        }
    },
    
    capitalized(str) {
        if (str && typeof str === 'string') {
        return str.charAt(0).toUpperCase() + (str.slice(1)).toLowerCase();
        } else {
            console.error("A variável str não é uma string ou é nula.");
            return 'error';
        }

        
    },
    async buscarDados() {
    this.dados.nome = this.capitalized(this.dados.nome);
    this.dados.email = this.dados.email.toLowerCase();
    console.log('dados: ', this.dados);
    try {
        // Exibe o modal de loading
        const loadingModal = Swal.fire({
            title: 'Aguarde...',
            showConfirmButton: false,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
         let url;
            if (process.env.NODE_ENV === 'production') {
            // URL de produção
            url = `http://gigabens.com.br/private/index.php?nome=${this.dados.nome}&email=${this.dados.email}&cell=${this.dados.cell}&assunto=${this.dados.assunto}&msg=${this.dados.msg}&veiculo=`;
            } else {
            // URL local para desenvolvimento
            url = `http://localhost:85/private/SendEmail.php?nome=${this.dados.nome}&email=${this.dados.email}&cell=${this.dados.cell}&assunto=${this.dados.assunto}&msg=${this.dados.msg}&veiculo=`;
            }
        const response = await axios.get(url); // Caminho correto para a API

        // Esconde o modal de loading
         loadingModal.close();

        // Processa a resposta da API e exibe o modal Swal
        this.retornoEmail(response.data);
        } catch (error) {
            console.error('Erro ao buscar dados da API:', error);
            
            // Esconde o modal de loading se houver um erro
            Swal.close();

            // Exibe um alerta de erro ao usuário (você pode personalizar isso conforme necessário)
            Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: 'Ocorreu um erro ao processar sua solicitação. Por favor, tente novamente mais tarde.'
            });
        }
    },

    retornoEmail(response) {
        // Verifique o código de status para determinar o ícone e a mensagem
        let icon = response.dados.status[0] === 1 ? 'error' : 'success';
        let mensagemErro = response.dados.status[1];
        
        // Divida a mensagem de erro para obter o título e o texto
        let mensagemSplit = mensagemErro.replace(')', '').split('(');
        mensagemSplit.forEach(element => {
            this.capitalized(element);
        });
        let titulo = this.capitalized(mensagemSplit[0]);
        
        Swal.fire({
            icon: icon,
            title: titulo,
            text: mensagemSplit[1] || '', // Se não houver texto entre parênteses, deixe vazio
            showConfirmButton: false,
            timer: 2000
        });
    }

    },
    created(){
       document.addEventListener('keyup', (event) => {
        if (event.key === 'Enter') {
            this.enviar(event);
        }
      });
    }
}
</script>

<style scoped>

h1{
    letter-spacing: .1rem;
  font-size: 3.5rem;
  color: var(--laranja);
  font-weight: bolder;
  text-align: center;
}
#form{
  margin-top: 5vh !important; 
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 1rem;
  padding: 1rem 1rem;
  /* background-color: var(--branco); */
  border-radius: 1rem;
  transition: 1s ease all !important;
}
#form:hover{
    transition: 1s ease all !important;
    transform: translate(0px, -1px);
}

#form #identificacao{
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  gap: .5rem;
}
#form #textarea{
    width: 100%;
}
#nome, 
#email{
  flex: 1;
}

input, textarea{
  width: 100%;
  padding: 1rem 1rem;
  border-radius: 1rem;
  border: none;
  box-shadow: 1px 1px 5px #333333bc;
  transition: .5s ease all;
  outline: none;
  font-size: 1rem;
  color: var(--font-color);
  background-color: var(--branco);
  min-width: 250px;
  font-weight: bolder;
  opacity: .7;
  font-weight: bolder
}
input:hover{
  box-shadow: 0px 0px 7px var(--azul) !important;
  transition: .5s ease all !important;
}
input:focus{
  opacity: 1;
  box-shadow: 0px 0px 4px var(--azul) !important;
  transition: .5s ease all !important;
  border-radius: 2rem;
}

input[type="button"]{
  width: 50%;
  min-width: 150px;
  max-width: 250px;
  padding: 1.2rem 1rem !important;
  border-radius: 2rem;
  border: none;
  box-shadow: 1px 1px 5px #333333bc;
  transition: .5s ease all;
  outline: none;
  font-size: 1.1rem;
  color: var(--branco);
  background-color: var(--azul);
  
  
}
input[type="button"]:hover{
    transition: .5s ease all !important;
    cursor: pointer;
    color: var(--branco) !important;
}

input[type="button"]:active, input[type="button"]:focus{
    transition: .5s ease all !important;
    transform: translate(0px, -3px) !important;
    box-shadow: inset 1px 1px 5px #000000 !important;
    border: 2px solid var(--dark-color) !important;
}

</style>
