const btn = document.querySelector('#btn');
const pass = document.querySelector('#pass');
btn.addEventListener('click', function () {
    if (pass.type == 'text') {
        pass.type = 'password';
        btn.innerHTML = '<i class="fas fa-eye"></i>';
    }
    else {
        pass.type = 'text';
        btn.innerHTML = '<i class="fas fa-eye-slash"></i>';
    }
});