/**
 * Start Show Panel Form Login
 * */
let panelForms = document.querySelectorAll('[panel-form]');

let  selectRankInput = document.querySelector('[select-rank]');
function hideAllPanelForms() {
    panelForms.forEach(form => {
        form.classList.add("d-none");
    });
}
function setSelectedValueFromLocalStorage(selectInput) {
    selectInput.querySelectorAll("option").forEach(option => {
        if (option.value === localStorage.getItem("last-login-opened")) {
            option.selected = true;
        }
    });
}
function showForm(form) {
    form.classList.remove('d-none');
}

if (selectRankInput) {
    selectRankInput.addEventListener("change", (e) => {
        hideAllPanelForms();
        let targetForm = document.getElementById(selectRankInput.value);
        if (targetForm) {
            localStorage.setItem("last-login-opened", selectRankInput.value);
            showForm(targetForm);
        }
    });
// Show last form opened
    hideAllPanelForms();
    showForm(document.getElementById(localStorage.getItem("last-login-opened")));
    setSelectedValueFromLocalStorage(selectRankInput);
}



/**
 * End Show Panel Form Login
 * */


/**
 * Show password in input
 */
function showPasswordSpan(content) {
    let span = document.createElement('span');
    span.classList.add('show-password-hint');
    span.textContent = content;
    return span;
}
let showPasswordInputs = document.querySelectorAll('[show-password]')
showPasswordInputs.forEach(input => {
    let content = input.getAttribute("show-password");
    let hintSpan = showPasswordSpan(content);
    hintSpan.addEventListener("click", () => {
        if (input.type === 'password') {
            input.type = 'text';
        } else {
            input.type = 'password';
        }
    });
    input.parentElement.style.position = 'relative';
    input.parentElement.appendChild(hintSpan);

});

/**
 * Show image when upload
 */
let liveImageInputs = document.querySelectorAll('[live-image]');

liveImageInputs.forEach(input => {
    input.addEventListener("change", (e) => {
        let canvas = input.parentElement.querySelector('[live-img-output]');
        let img = document.createElement('img');

        img.src = URL.createObjectURL(e.target.files[0]);
        img.onload = function () {
            URL.revokeObjectURL(img.src)
        }

        canvas.appendChild(img);
    });
});
