/**
 * 
 * antes de enviar para o php fazendo uma validação dos dados
 * 
 **/

/*validandoCpf*/
function validaCpf(cpf) {
    //declarando variaveis locais
    var valido;

    /**
     * 
     * fazendo teste da função sendo chamado pela outra
     * 
     * */

    //verificando cpf
    cpf = cpf.trim();
    cpf = cpf.replace(/[^\d]+/g, ""); //expressão regular para tirar . e o - do cpf
    cpf = cpf.length;

    //vendo se o cpf tem 11 caracteres
    if (cpf == 11) {

        valido = true;

    } else {
        valido = false;
    }

    return valido;

}
/*fim*/

/*funcãoDeLogin*/
function Login() {
    //declarando variaveis locais
    var login, senha, serverHttp;

    login = document.getElementById("LoginCpf").value;
    senha = document.getElementById("LoginSenha").value;

    //verificando os valores
    if (login == "" || login == null || senha == "" || senha == null) { //se o valores estiverem vazio

        alert("Não tem nada aqui volte e tenta de novo");

    } else { //segunda etapa verificando os valores

        //verificando se o cpf e valido
        if (validaCpf(login) === true) {
            //verificando a senha
            if (senha.length <= 15 && senha.length >= 6) {

                //Desenvolvendo o ajax
                serverHttp = new XMLHttpRequest();      //Criando um objeto xml

                serverHttp.onreadystatechange = function () {
                    //verificando o status e se esta pronto para responder
                    if(this.readyState == 4 && this.status == 200){
                        
                        //verificando se tem cadastro
                        if(parseInt(this.responseText) === 1){

                            alert("Essa conta é invalida!!!");

                        }else{

                            location.href= this.responseText;  
                        }

                    }

                };

                serverHttp.open("POST", "../Php/Executando.php", true);

                serverHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                serverHttp.send("loginCpf="+login+"&loginSenha="+senha);





            } else {

                alert("sua senha não esta aceitavel");
            }
        }else{
            alert("Cpf invalido!!!");
        }

    }
}

/*fim*/

/*funcao validacao*/
function validaDados(nome, cpf, cnpj, empresa, rua, bairro, cep, cidade, uf, tel){
    var dadoValida;

    //nome = nome.trim().length;
    //cpf = cpf.trim().length;
    cnpj = cnpj.trim().length;
    empresa = empresa.trim().length;
    rua = rua.trim().length;
    bairro = bairro.trim().length;
    cep = cep.trim().length;
    cidade = cidade.trim().length;
    uf = uf.trim().length;
    tel = tel.trim().length;

    if(nome.trim().length <= 150 && nome.trim().length >= 3){
        
        if(validaCpf(cpf) === true){

            alert("Tem que ser um nome valido");

        }else{
            
            alert("Tem que ser um nome valido");
        }

    }else{
        alert("Tem que ser um nome valido");
    }

    dadoValida = new Array(nome, cpf, empresa, rua, bairro, cep, uf, tel);

    alert(dadoValida.toString());
    
}
/*fim*/

/*funcao cadastro*/
function registrarUser(){
    var nomeReg, cpfReg, cnpjReg, empresaReg, ruaReg, bairroReg, cepReg, cidadeReg, ufReg, telReg;

    //dadosCadastro
    nomeReg = document.getElementById('nomeCliente').value;
    cpfReg = document.getElementById('cpfCliente').value;
    cnpjReg = document.getElementById('cnpjCliente').value;
    empresaReg = document.getElementById('empresaCliente').value;
    ruaReg = document.getElementById('ruaCliente').value;
    bairroReg = document.getElementById('bairroCliente').value;
    cepReg = document.getElementById('cepCliente').value;
    cidadeReg = document.getElementById('cidadeCliente').value;
    ufReg = document.getElementById('ufCliente').value;
    telReg = document.getElementById('telefoneCliente').value;

    validaDados(nomeReg, cpfReg, cnpjReg, empresaReg, ruaReg, bairroReg, cepReg, cidadeReg, ufReg, telReg);
}

/*função deslogar*/
function sairLogin(){
    var exitSessao, serverHttp;

    //valor que vai ser usado para acionar a funcao php
    exitSessao = parseInt(0);

    //Desenvolvendo o ajax
    serverHttp = new XMLHttpRequest();      //Criando um objeto xml

    serverHttp.onreadystatechange = function () {
        //verificando o status e se esta pronto para responder
        if(this.readyState == 4 && this.status == 200){
            //alert(this.responseText);

            alert("Você foi deslogado");

            //voltando a tela de login
            location.href = this.responseText;
        }

    };

    serverHttp.open("POST", "../Php/Executando.php", true);

    serverHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    serverHttp.send("outSign="+exitSessao);

}
/*fim*/

/* funcao */
function EmDesenvolvimento(){
    alert("Está em desenvolvimento!!! E não desliga caixa de alerta !!!");
}