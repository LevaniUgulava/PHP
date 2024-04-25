function showFields() {
    var productType = document.getElementById("productType").value;
    var dvdFields = document.getElementById("dvdFields");
    var bookFields = document.getElementById("bookFields");
    var furnitureFields = document.getElementById("furnitureFields");

    // Hide all fields
    dvdFields.classList.add("hidden");
    bookFields.classList.add("hidden");
    furnitureFields.classList.add("hidden");

    // Show fields based on product type
    if (productType === "DVD") {
        dvdFields.classList.remove("hidden");
    } else if (productType === "Book") {
        bookFields.classList.remove("hidden");
    } else if (productType === "Furniture") {
        furnitureFields.classList.remove("hidden");
    }
}

// Call showFields initially to set the initial state
showFields();