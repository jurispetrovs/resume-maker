function onCheck(checkbox, id) {
    var dateElement = document.getElementById(id);
    dateElement.disabled = checkbox.checked;
    if (checkbox.checked) {
        dateElement.valueAsDate = new Date();
    }
    else
        dateElement.value = '';
}