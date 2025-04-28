function signup(event) {

    event.preventDefault();


    var email = document.getElementById("email").value;
    var senha = document.getElementById("senha").value;
    var cpf = document.getElementById("cpf").value;

    if (email === "example123@gmail.com" && senha === "admin" && cpf === "000.000.000-00") {
        Swal.fire({
            title: 'Cadastro Realizado!',
            text: 'Seu cadastro foi realizado com sucesso!',
            icon: 'success',
            confirmButtomText: 'OK',
            confirmButtonColor: '#20C20E',
            background: '#000000',
            color: '#20C20E'
        }).then(() => {
            setTimeout(() => {
                location.href = "../pages/index.html";
            }, 100);
        });

    } else {
        Swal.fire({
            title: 'Erro!',
            text: 'Verifique os campos preenchidos',
            icon: 'error',
            confirmButtomText: 'OK',
            confirmButtonColor: '#20C20E',
            background: '#000000',
            color: '#20C20E'
        }).then(() => {
            setTimeout(() => {
                location.href = "#";
            }, 100);
        });
    }
}