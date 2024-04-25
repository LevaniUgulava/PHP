function submitMassDelete() {
    var form = document.getElementById("massDeleteForm");
    if (confirm("Are you sure you want to delete the selected products?")) {
        form.submit();
    }
}
