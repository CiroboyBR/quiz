
var resp;
var pontos = 0;
var perguntasRespondidas = 0;
var nomeParticipante = "Desconhecido";
var recararregar = true;
var qtdPerguntas = 12;
const somPalmas = new Audio('audio/palmas.mp3');
const somErro = new Audio('audio/error.mp3');
var tempoTotal = 0
var somAtivado = true

//altera fundo
document.getElementById('bVideo').src = 'video/b'+ Math.floor(Math.random() * 12+1) +'.mp4';

function chageIcon(domImg,srcImage)
        {
            var img = new Image();
            img.onload = function()
            {
                // Load completed
                domImg.src = this.src;
            };
            img.src = srcImage;
        }

function desligaEfeitos(){
    if(somAtivado == true){
        somAtivado = false
        chageIcon(document.getElementById("somEfeitos"),"img/icone_som_off.png")
    } else {
        somAtivado = true
        chageIcon(document.getElementById("somEfeitos"),"img/icone_som_on.png")
    }
}

//Simplificação de msg de erro da SweetAlert2
function msgErro(msg, tempo) {
    //Exibe erro
    Swal.fire({
      title: msg,
      icon: 'error',
      showConfirmButton: false,
      timer: tempo,
      willClose: () => { }
    })
  }
  
  //Simplificação de msg de OK da SweetAlert2
  function msgOK(msg, tempo) {
    //Exibe erro
    Swal.fire({
      title: msg,
      icon: 'success',
      showConfirmButton: false,
      timer: tempo,
      willClose: () => { }
    })
  }

function alteraDisciplina(){
    resetaPontos();
    getPergunta();
}
function getPergunta() {
    
    resetaValores();

    //  if(perguntasRespondidas<10)

    $.ajax({
        url: "backend/getPergunta.php", //Endereço da requicição
        type: "POST", //tipo da requisição
        data: {
            turma: document.getElementById('selTurma').value
        }, //os dados da requisição
        dataType: "json" // o formato dos dados da requisição. pode ser HTML. XML, JSON e JSONP
    }).done(function (msg) {

        document.getElementById('areaPergunta').innerHTML = (1+perguntasRespondidas)+'/'+qtdPerguntas+': ('+msg.disciplina+') - '+msg.pergunta;
        document.getElementById('itemA').innerHTML = msg.a;
        document.getElementById('itemB').innerHTML = msg.b;
        document.getElementById('itemC').innerHTML = msg.c;
        document.getElementById('itemD').innerHTML = msg.d;

        resp = msg.resp;

        //reseta cor das respostas
        $('#itemA').css('background-color', '');
        $('#itemB').css('background-color', '');
        $('#itemC').css('background-color', '');
        $('#itemD').css('background-color', '');
    }).fail(function (obj) {
        console.log(obj);
    });
}


function getPerguntaX(iid) {
    document.getElementById('btResponder').disabled = false
    resetaValores();

    $.ajax({
        url: "backend/getPerguntaId.php", //Endereço da requicição
        type: "GET", //tipo da requisição
        data: {
            'id': iid
        }, //os dados da requisição
        dataType: "json" // o formato dos dados da requisição. pode ser HTML. XML, JSON e JSONP
    }).done(function (msg) {

        document.getElementById('areaPergunta').innerHTML = (1+perguntasRespondidas)+'/'+qtdPerguntas+': ('+msg.disciplina+') - '+msg.pergunta;
        document.getElementById('itemA').innerHTML = msg.a;
        document.getElementById('itemB').innerHTML = msg.b;
        document.getElementById('itemC').innerHTML = msg.c;
        document.getElementById('itemD').innerHTML = msg.d;

        resp = msg.resp;

        //reseta cor das respostas
        $('#itemA').css('background-color', '');
        $('#itemB').css('background-color', '');
        $('#itemC').css('background-color', '');
        $('#itemD').css('background-color', '');
    }).fail(function (obj) {
        console.log(obj);
    });
}



function resetaValores() {
    document.getElementById('selA').checked = false;
    document.getElementById('selB').checked = false;
    document.getElementById('selC').checked = false;
    document.getElementById('selD').checked = false;
}



function respondePergunta() {

    if (perguntasRespondidas >= qtdPerguntas) {


        nomeParticipante = prompt('Digite seu nome: ');
        
        if(nomeParticipante == "")
            nomeParticipante = "Desconhecido"
        
            alert('Parabéns ' + nomeParticipante + '. Teste finalizado! total de pontos: ' + pontos);

        enviaPontuacao(nomeParticipante, pontos);

        if (recararregar == true){
            //window.location.reload();
            resetaPontos();
        }


        return 0;
    } else {
        perguntasRespondidas = perguntasRespondidas + 1;
    }
    /*
    console.log(resp);
    console.log('item A:' + document.getElementById('itemA').innerText)
    console.log('item B:' + document.getElementById('itemB').innerText)
    console.log('item C:' + document.getElementById('itemC').innerText)
    console.log('item D:' + document.getElementById('itemD').innerText)
    */
    if (resp == document.getElementById('itemA').innerText && document.getElementById('selA').checked == true) {
        console.log('resposta correta');
        pontos = pontos + 10;
        if(somAtivado)
            somPalmas.play();
        msgOK('Acertou!', 1700);
    }
    else if (resp == document.getElementById('itemB').innerText && document.getElementById('selB').checked == true) {
        console.log('resposta correta');
        pontos = pontos + 10;
        if(somAtivado)
            somPalmas.play();
        msgOK('Acertou!', 1700);
    }
    else if (resp == document.getElementById('itemC').innerText && document.getElementById('selC').checked == true) {
        console.log('resposta correta');
        pontos = pontos + 10;
        if(somAtivado)
            somPalmas.play();
        msgOK('Acertou!', 1700);
    }
    else if (resp == document.getElementById('itemD').innerText && document.getElementById('selD').checked == true) {
        console.log('resposta correta');
        pontos = pontos + 10;
        if(somAtivado)
            somPalmas.play();
        msgOK('Acertou!', 1700);
    }

    else {
        console.log('Resposta errada');
        msgErro('Errou!', 1700);
        if(somAtivado)
            somErro.play();
    }

    document.getElementById('btResponder').disabled = true

    //MARCA A RESPOSTA
    if(resp == document.getElementById('itemA').innerText)
            $('#itemA').css('background-color', 'green');
    else if(resp == document.getElementById('itemB').innerText)
            $('#itemB').css('background-color', 'green');
    else if(resp == document.getElementById('itemC').innerText)
            $('#itemC').css('background-color', 'green');
    else if(resp == document.getElementById('itemD').innerText)
            $('#itemD').css('background-color', 'green');

    //Espera 3 segundos
    
    setTimeout(function() {
        
        getPergunta();
        resetaValores();
        document.getElementById('btResponder').disabled = false
      }, 3000);
      
      document.getElementById('painelPontos').innerText = pontos;
}

function enviaPontuacao(n, p) {
    
    if(pontos <=120 && pontos != 0 && pontos != "" && perguntasRespondidas > 10)
    $.ajax({
        url: "backend/recebePontuacao.php", //Endereço da requicição
        type: "POST", //tipo da requisição
        data: {
            nome: n,
            pontos: p
        }, //os dados da requisição
        dataType: "text" // o formato dos dados da requisição. pode ser HTML. XML, JSON e JSONP
    }).done(function (msg) {
        console.log(msg)

        if (msg == "OK"){
            console.log(msg)
            resetaPontos();
           // window.location.reload();
        }

    }).fail(function (obj) {

    });

}

function recebeRanking() {

    $.ajax({
        url: "backend/getRanking.php", //Endereço da requicição
        type: "POST", //tipo da requisição
        data: {}, //os dados da requisição
        dataType: "json" // o formato dos dados da requisição. pode ser HTML. XML, JSON e JSONP
    }).done(function (msg) {
        document.getElementById('tabRank').innerHTML = "<tr><td>PONTOS</td><td>NOME</td></tr>";

        for (let i = 0; i < msg.length; i++) {
            document.getElementById('tabRank').innerHTML = document.getElementById('tabRank').innerHTML + "<tr><td>" + msg[i].pontos + "</td><td>" + msg[i].nome + "</td></tr>";
            console.log(msg[i].nome)
        }


    }).fail(function (obj) {

    });

}

function resetaPontos() {
    pontos = 0;
    perguntasRespondidas = 0;
    tempoTotal = 0
}

getPergunta();
recebeRanking();

