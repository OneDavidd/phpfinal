function validarFormulario() {
    var ddd = document.getElementById('ddd').value;
    if (ddd.length < 3) {
        alert('O DDD deve ter 3 dígitos.');
        return false;
    }
    return true;
}

function mascaraCNPJ(input) {
    var value = input.value.replace(/\D/g, '');
    value = value.replace(/^(\d{2})(\d)/, '$1.$2');
    value = value.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
    value = value.replace(/\.(\d{3})(\d)/, '.$1/$2');
    value = value.replace(/(\d{4})(\d)/, '$1-$2');
    input.value = value;
}

function mascaraDDD(input) {
    input.value = input.value.replace(/\D/g, '');
}

function mascaraTelefone(input) {
    var value = input.value.replace(/\D/g, '');
    value = value.replace(/(\d{5})(\d)/, '$1-$2');
    input.value = value;
}