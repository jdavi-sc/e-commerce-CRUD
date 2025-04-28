function login(event) {

    event.preventDefault();


    var email = document.getElementById("email").value;
    var senha = document.getElementById("senha").value;

    if (email === "example123@gmail.com" && senha === "admin") {
        Swal.fire({
            title: 'Login Realizado!',
            text: 'Seu login foi realizado com sucesso!',
            icon: 'success',
            confirmButtomText: 'OK',
            confirmButtonColor: '#20C20E',
            background: '#000000',
            color: '#20C20E'
        }).then(() => {
            setTimeout(() => {
                location.href = "../pages/home.html";
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