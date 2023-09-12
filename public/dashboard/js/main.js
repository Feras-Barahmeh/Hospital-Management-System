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

selectRankInput.addEventListener("change", (e) => {
    hideAllPanelForms();
    let targetForm = document.getElementById(selectRankInput.value);
    if (targetForm) {

        targetForm.classList.remove('d-none');
    }
});


/**
 * End Show Panel Form Login
 * */
