const inputEmail = document.getElementById("email");
const inputPass = document.getElementById("password");
const inputSecondSubmit = document.getElementById("sub_2");

const checkInputEmail = function() {
    const regExpEmail = new RegExp("[\\w-]+@([\\w-]+\\.)+[\\w-]+");
    if (regExpEmail.test(inputEmail.value)) {
        inputEmail.classList.remove("input--invalid");
    } else {
        inputEmail.classList.add("input--invalid");
    }
};

inputEmail.addEventListener("focusout",() => {
    checkInputEmail();
    changeEvent();
},{once:true});

function changeEvent() {
    inputEmail.onchange = () => {
        checkInputEmail();
        console.log('change');
    }
}

inputPass.onkeypress = function () {
    if(inputPass.value.length > 8) {
        inputPass.classList.remove("input--invalid");
    } else {
        inputPass.classList.add("input--invalid");
    }
};

// inputSecondSubmit.onclick = function (e) {
//     const name = document.getElementById("name");
//     const select = document.getElementById("selectClans");
//     const list = document.getElementById("list");
//     const divError = document.getElementById("error-div");
//
//     if(!name.value || !select.value || !list.value) {
//         divError.classList.remove("hide");
//         divError.classList.add("show");
//     } else {
//         divError.classList.add("hide");
//         console.log("kk");
//     }
// };