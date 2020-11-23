/*navegacaoInformacaoSACandPortfolio*/
function navegacaoInfo(value){
    //declarando variavel local
    var botaoClass, secaoInfoClass,listClassDiv;
    
    /*
    *
    *guardando uma lista de className q possui a class botao one
    * 
    * 
    * */
    botaoClass = document.getElementsByClassName('botaoOne');     //guardando o nome da class em uma variavel
    secaoInfoClass = document.getElementsByClassName('secaoInfo');
    listClassDiv = botaoClass[value].classList;       //guardando a lista da div em questão

    /**
     * 
     * Convertendo para string para usar o indexOf
     * e depois usar parseInt converte em numero
     * 
     * */
    listClassDiv = listClassDiv.toString();
    listClassDiv = listClassDiv.indexOf("butonActvie");
    listClassDiv = parseInt(listClassDiv);

    //Fazendo a mudança de conteudo
    if(listClassDiv == -1){
        //alert("Ele não existe " + secaoInfoClass[value]);
        //botaoClass[value].classList.add("butonActvie");
        switch(value){
            case 0:
                //alert("Projeto " + value);
                botaoClass[value].classList.add("butonActvie");
                secaoInfoClass[1].classList.add("noVisive");
                botaoClass[1].classList.remove("butonActvie");
                secaoInfoClass[value].classList.remove("noVisive");
            break;
            
            case 1:
                //alert("Portfolio" + value);
                botaoClass[value].classList.add("butonActvie");
                secaoInfoClass[0].classList.add("noVisive");
                botaoClass[0].classList.remove("butonActvie");
                secaoInfoClass[value].classList.remove("noVisive");
            break;
            
            default:
                alert("Erro no valores da função!");
            break;    
        }

    }

}



/*fim*/