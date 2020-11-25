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
                        alert(this.responseText);
                    }

                };

                serverHttp.open("POST", "../Php/Mecanismo.php", true);

                serverHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                serverHttp.send("loginCpf="+login+"&loginSenha="+senha);





            } else {

                alert("sua senha não esta aceitavel");
            }
        }else{
            alert("Cpf invalido!!!");
        }

    }
    /*if(validaCpf(login) == true){
        alert("Cpf valido");
    }else{
        alert("Cpf falso e negado!");
    }*/


}

/*fim*/