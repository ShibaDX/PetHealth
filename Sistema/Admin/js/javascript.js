const handlePhone = (event) => {
    let input = event.target
    input.value = phoneMask(input.value)
  }
  
  const phoneMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g,'')
    value = value.replace(/(\d{2})(\d)/,"($1) $2")
    value = value.replace(/(\d)(\d{4})$/,"$1-$2")
    return value
  }
  function applyCpfMask(input) {
    input.value = cpf(input.value);
}

function cpf(v) {
    v = v.replace(/\D/g, ""); // Remove tudo o que não é dígito
    v = v.replace(/(\d{3})(\d)/, "$1.$2"); // Coloca um ponto entre o terceiro e o quarto dígitos
    v = v.replace(/(\d{3})(\d)/, "$1.$2"); // Coloca um ponto entre o terceiro e o quarto dígitos novamente (para o segundo bloco de números)
    v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2"); // Coloca um hífen entre o terceiro e o quarto dígitos
    return v;
}

function validateCpf(input) {
    const cpfValue = input.value.replace(/\D/g, ''); // Remove caracteres não numéricos
    const isValid = validateCpfDigits(cpfValue);

    const errorSpan = document.getElementById('cpfError');
    errorSpan.innerText = isValid ? '' : 'CPF inválido';
}

function validateCpfDigits(cpf) {
    const cpfArray = cpf.split('').map(Number);

    if (cpfArray.length !== 11 || new Set(cpfArray).size === 1) {
        return false; // CPF não pode ter todos os dígitos iguais
    }

    const calcDigit = (j) =>
        (cpfArray
            .slice(0, j)
            .map((v, i) => v * (j + 1 - i))
            .reduce((a, b) => a + b, 0) * 10) %
        11;

    for (let i = 0; i < 2; i++) {
        if (calcDigit(i + 9) !== cpfArray[i + 9]) {
            return false; // Dígito verificador não corresponde
        }
    }

    return true;
}
