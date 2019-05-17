const inputSubmit = document.getElementById("form_submit");
const inputEmail = document.getElementById("email");
const inputPass = document.getElementById("password");
const inputSecondSubmit = document.getElementById("sub_2");

inputSubmit.onclick = function (e) {
    const form_1 = document.getElementById("form_1");
    const form_2 = document.getElementById("form_2");
    e.preventDefault();
    let errors = document.querySelectorAll("input.input--invalid");
    if(errors.length == 0) {
        form_1.style.display = "none";
        form_2.classList.remove("secondForm--invisible");
        form_2.classList.add("secondForm--visible");
    }
};

let checkInputEmail = function() {
    const regExpEmail = new RegExp("[\\w-]+@([\\w-]+\\.)+[\\w-]+");
       if (regExpEmail.test(inputEmail.value)) {
            inputEmail.classList.remove("input--invalid");
        } else {
            inputEmail.classList.add("input--invalid");
    }
};

inputEmail.addEventListener("focusout",()=> {
    checkInputEmail();
    inputEmail.onkeypress = function () {
        checkInputEmail();
    }
},{once:true});

inputPass.onkeypress = function () {
     if(inputPass.value.length > 8) {
        inputPass.classList.remove("input--invalid");
    } else {
        inputPass.classList.add("input--invalid");
    }
};

inputSecondSubmit.onclick = function (e) {
    const name = document.getElementById("name");
    const select = document.getElementById("selectClans");
    const list = document.getElementById("list");
    const divError = document.getElementById("error-div");
    e.preventDefault();

console.log(select.value);
    if(!name.value || !select.value || !list.value) {
        divError.classList.remove("hide");
        divError.classList.add("show");
    } else {
        divError.classList.add("hide");
        console.log("kk");
    }

};