var inputTK = document.getElementById("input1");
var inputMK = document.getElementById("input2");

inputTK.addEventListener('focus', function() {
    inputTK.classList.add('focus');
});

inputMK.addEventListener('focus', function() {
    inputMK.classList.add('focus');
});

inputTK.addEventListener('blur', function() {
    if(inputTK.value == '') {
        inputTK.classList.remove('focus');
    }
});

inputMK.addEventListener('blur', function() {
    if(inputMK.value == '') {
        inputMK.classList.remove('focus');
    }
});