/**
 * Check all
 */
function checkStatusBtnDeleteSelected() {
    if (numsSelected > 0 ) {
        btnDeleteSelected.removeAttribute('disabled');
        btnDeleteSelected.style.pointerEvents = 'auto';
    } else {
        btnDeleteSelected.setAttribute('disabled', '');
        btnDeleteSelected.style.pointerEvents = 'none';
    }
}
function incrementDecrementRowCheckedNumber(checkbox) {
    if (checkbox.checked) {
        numsSelected++;
    } else {
        numsSelected--;
    }
}
function changeIDsSelected(checkbox) {
    if (checkbox.checked) {
        selectedIDs.push(checkbox.value)
    } else {
        let index = selectedIDs.indexOf(checkbox.value);
        if (index !== -1){
            selectedIDs.splice(index, 1);
        }
    }
}

const btnDeleteSelected = document.getElementById('BtnDeleteSelected');
let recordSelected = document.querySelectorAll('[record-selected]');
let numsSelected = 0;
let selectedIDs = [];


recordSelected.forEach(checkbox => {
   if (checkbox.checked) numsSelected++;
   checkbox.addEventListener('change', () => {
       incrementDecrementRowCheckedNumber(checkbox);
       checkStatusBtnDeleteSelected();
       changeIDsSelected(checkbox);
   });
});

btnDeleteSelected.addEventListener('click', () => {
    if (selectedIDs.length > 0) {
        let selectedValues = document.getElementById('SelectedValues');
        selectedValues.value = selectedIDs;
    } else {
        btnDeleteSelected.setAttribute('disabled', '');
    }

});



