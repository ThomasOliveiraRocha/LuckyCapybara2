/*
  Autores: <Thomas Oliveira>, <João Carvalho>, <Sandro Christe> e <André Oliveira>
  Data: <30/03/2024>
*/


function getSoma(){
    let v1 = document.getElementById('num1').value
    let v2 = document.getElementById('num2').value
    let v3 = document.getElementById('res').value
    let num1 = new Decimal(v1).toNumber()
    let num2 = new Decimal(v2).toNumber()
    let res = new Decimal(v3).toNumber()
    let res2 = new Decimal(num1+num2).toNumber()
    console.log(num1)
    console.log(num2)
    console.log(res)
    console.log(res2)
    if(res2 != res){
        alert('Soma deu errado esperado')
    } else {
        alert('Soma com resultado certo')
    }
}

document.getElementById('Verificar').addEventListener("click", getSoma,false)
