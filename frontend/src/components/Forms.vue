<template>
    <div id="mainForm">
        <div id="texto">
            <h2>{{texto}} <h1 v-show="valor">R${{valor}}</h1> </h2>
            
        </div>
        <form action="POST" id="form">
            <div v-show="textoForm">{{textoForm}}</div>
            <input type="text" v-model="dados.nome" :v-bind="dados.nome" placeholder="Insira seu nome..." required>
            <input type="email" v-model="dados.email" :v-bind="dados.email" placeholder="Insira seu email..." required>
            <input v-show="dados.email" type="number" v-model="dados.cell" :v-bind="dados.cell" placeholder="Insira seu melhor celular..." required>
            <input maxlength="7" type="text" v-model="dados.placa" :v-bind="dados.placa" placeholder="Insira a Placa do Veículo..." required>
            <select id="selectAssunto" v-model="dados.assunto">
                <option v-for="item in assuntos" :key="item" :value="item">{{item}}</option>
            </select>
            <select v-show="dados.cell" id="selectVeiculo" v-model="dados.veiculo">
                <option v-for="item in veiculos" :key="item" :value="item">{{item}}</option>
            </select>
            <input @click="enviar($event)" type="button" value="Solicitar Cotação" >
        </form>
    </div>
    
</template>

<script>
import Swal from 'sweetalert2';
import axios from 'axios';


export default{
    name: 'Forms',
    data(){
        return {
            texto: 'Proteja o seu Veículo à partir de',
            valor: '75,00/mês',
            textoForm: 'Preencha o formulário para cotar a sua cobertura',
            dados: {
                nome: null,
                email: null,
                cell: null,
                placa: null,
                veiculo: null,
                assunto: null
            },
            veiculos: [
                'Carro',
                'Moto',
                'Caminhão',
                'Van',
                'Caminhonete',
                'Ciclomotor',
            ],
            assuntos: [
                'Solicitar Cotação',
                'Seguro',
                'Cobertura e Seguro'
                
            ]
            
        }
    },
   methods: {
    capitalized(str) {
        if (str && typeof str === 'string') {
        return str.charAt(0).toUpperCase() + (str.slice(1)).toLowerCase();
        } else {
            console.error("A variável str não é uma string ou é nula.");
            return 'error';
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
    
   retornoEmail(response) {
    
    // Verifique o código de status para determinar o ícone e a mensagem
    let icon = response.dados.status[0] === 1 ? 'error' : 'success';
    let mensagemErro = response.dados.status[1];
    
    // Divida a mensagem de erro para obter o título e o texto
    let mensagemSplit = (mensagemErro.replace(')', '')).split('(');
    mensagemSplit.forEach(element => {
        this.capitalized(element);
    });
    let titulo = this.capitalized(mensagemSplit[0]);
    
    Swal.fire({
        icon: icon,
        title: titulo,
        text: mensagemSplit[1] || '', // Se não houver texto entre parênteses, deixe vazio
        showConfirmButton: false,
        timer: 1500

    });
    },
    async buscarDados() {
       

        this.dados.placa = this.dados.placa.toUpperCase();
        this.dados.nome = this.capitalized(this.dados.nome);
        this.dados.email = this.dados.email.toLowerCase();
         console.log('dados: ', this.dados);
        try {
            var url = `http://localhost:85/private/sendEmail.php?nome=${this.dados.nome}&email=${this.dados.email}&cell=${this.dados.cell}&placa=${this.dados.placa}&veiculo=${this.dados.veiculo}&assunto=${this.dados.assunto}`;
            const response = await axios.get(url); // Caminho correto para a API

            const apiResponse =  response.data;
            this.retornoEmail(apiResponse);
        } catch (error) {
            console.error('Erro ao buscar dados da API:', error);
        }
    },
    },  
    created() {
    if (this.assuntos.length > 0) 
    {
            this.dados.assunto = this.assuntos[0];
    }
    if (this.veiculos.length > 0) 
    {
            this.dados.veiculo = this.veiculos[0];
    }
    
    const selectAssunto = document.getElementById('selectAssunto');
    if (selectAssunto) {
        selectAssunto.addEventListener('change', (event) => {
            this.dados.assunto = event.target.value;
        });
    } 
    const selectVeiculo = document.getElementById('selectVeiculo');
    if (selectVeiculo) {
        selectVeiculo.addEventListener('change', (event) => {
            this.dados.veiculo = event.target.value;
        });
    } 

    document.addEventListener('keyup', (event) => {
        if (event.key === 'Enter') {
            this.enviar(event);
        }
    });
}


    
}
</script>

<style scoped>
#mainForm{
    z-index: 1;
    border-radius: 1rem;
    position: absolute;
    top: 10vh;
    left: 70%;
    transform: translate(-50%, 10%);
    min-width: 400px !important;
    min-height: 600px;
    width: 20vw;
    background-color: var(--azul);
    color: var(--branco);
    padding: 2rem 1rem !important;
    display: flex;
    flex-direction: column;
    gap: 1rem;
    justify-content: center;
    align-items: center;
}

@media (max-width: 790px){
    #mainForm{
        width: 90vw;
        height: 80vh;
        left: 50%;
    }
    
}
#texto{
    font-weight: bolder;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
}
h2{
    font-size: 2.75rem !important;
    line-height: 3.5rem;
}
h1{
    font-size: 3.5rem !important;
    color: var(--laranja);
    font-weight: bolder;
}

#form{
    display: flex;
    flex-direction: column;
    gap: 1rem;
    padding: 0rem 1rem;
}

#form input, #form select{
    padding: .75rem .5rem;
    border-radius: .5rem;
    border: none;
    outline: none;
    font-size: 1rem;
    color: var(--font-color);
    background-color: var(--branco);
    width: 100%;
    min-width: 150px;
    transition: .5s ease all;
    box-shadow: 1px 1px 5px #333333bc;
}

#form input:hover{
    box-shadow: 2px 2px 7px #333 !important;
    transition: .5s ease all !important;
    transform: translate(-3px, -3px) !important;
     border: 1px solid var(--laranja) !important;
}

#form input[type="button"]{
    background-color: var(--laranja);   
    color: var(--branco);
    font-weight: bold;
    cursor: pointer;
    transition: .5s ease all;
    box-shadow: 1px 1px 5px #333333bc;
    border-radius: 2rem;
   
    
}
#form input[type="button"]:hover{
    box-shadow: 0px 2px 7px var(--dark-color) !important;
    transition: .5s ease all !important;
    transform: translate(0px, -3px) !important;
    border: 0px solid var(--dark-color) !important;
    color: var(--dark-color) !important;

}
#form input[type="button"]:active{
    box-shadow: 0px -2px 5px var(--dark-color) !important;
    transition: .5s ease all !important;
    transform: translate(0px, 3px) !important;
    border: 2px solid var(--dark-color) !important;
    color: var(--dark-color) !important;
}
</style>