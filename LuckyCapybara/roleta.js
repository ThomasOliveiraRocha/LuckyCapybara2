/*
  Autores: <Thomas Oliveira>, <João Carvalho>, <Sandro Christe> e <André Oliveira>
  Data: <30/03/2024>
*/

//inicializando variáveis
perfecthalf = ((1 / 37) * 360) / 2;

let currentLength = perfecthalf;

let results = [];

$(".spin").click(() => {
  //aplica blur na imagem
  $(".wheel img").css("filter", "blur(8px)");

  //gera numero aleatorio e adquire angulação de giro
  random_number = getRandomInt(0, 37);
  results.push(random_number);
  spininterval = random_number * (360 / 37) + getRandomInt(3, 4) * 360;
  currentLength += spininterval;
  numofsecs = spininterval;
  $("#lista1").append("<li>"+random_number+"</li>");

  //printa angulação total e posição escolhida; A função no meio retorna a soma dos elementos da lista
  console.log("\nPosição: " + results.reduce(function(total_sum, value){ return total_sum + value;}, 0)%37 + "\nCurrent Length: " + currentLength);

  //gira a imagem com base em current lenght
  $(".wheel img").css("transform", "rotate(" + currentLength + "deg)");

  //tira o blur da imagem depois de um tempinho
  setTimeout(function () {
    $(".wheel img").css("filter", "blur(0px)");
  }, numofsecs);
});

//Função para retornar um número aleatório entre um valor mínimo e um valor máximo
function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

//Função que carrega depois da página ser totalmente carregada. Ao clicar na imagem, inicia a função click
$(document).ready(function() {
  $(".spin").click();
})





$(document).ready(function () {
  $("#btn3").click(function () {
      
      results.sort();

      $("#lista1 li").each( function(index, elem){
          elem.innerHTML = results[index];
      });
     
      console.log('TODO2');
  });

});
