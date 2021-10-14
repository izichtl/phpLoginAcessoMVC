
function getRoot(){
    let root="http://"+document.location.hostname+"/crudphp/loginAcesso/"
    return root
}

function getCaptcha(){
    grecaptcha.ready(function() {
        grecaptcha.execute('6LfSeKgaAAAAAP704tc_bJHiiO3j7tuSItncjcYO', {action: 'homepage'}).then(function(token) {
            // Add your logic to submit to your backend server here.
            const gRecaptchaResponse=document.querySelector("#g-recaptcha-response").value=token;
            
            
        });
      });
}
//getCaptcha()




$("#formCadastro").on("submit", function(event){
    event.preventDefault();
    var dados=$(this).serialize();
    console.log('a');
    
    $.ajax({
        url: 'http://localhost/crudphp/loginAcesso/controllers/controllerCadastro',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function(response){
            
            const arr = response.erros;
            console.log('b');
            if(response.retorno == 'erro'){
                $('.caixalimpa').empty();
                arr.forEach(element => {
                    $('.caixalimpa').append(`<h6>${element}</h6><br>`)
                });
            }else{
                $('.caixalimpa').empty();
                $('.caixalimpa').append(`<h6>Dados inseridos com sucesso!</h6><br>`);
            }
            
        }
    })
})


//var mask = VMasker(document.querySelector("dataNascimento")).maskPattern("99/99/9999");