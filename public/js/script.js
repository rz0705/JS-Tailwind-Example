document.addEventListener("DOMContentLoaded", function () {
    var addProductButton = document.getElementById("btn");

    addProductButton.addEventListener("click", function (event) {
        event.preventDefault(); // Prevent form submission for now

        var nameField = document.getElementById("name");
        var brandField = document.getElementById("brand");
        var priceField = document.getElementById("price");
        var categoryField = document.getElementById("category");
        var itemWeightField = document.getElementById("item-weight");
        var descriptionField = document.getElementById("description");

        var name = nameField.value;
        var brand = brandField.value;
        var price = parseFloat(priceField.value);
        var category = categoryField.value;
        var itemWeight = parseFloat(itemWeightField.value);
        var description = descriptionField.value;

        // Validation checks
        var isNameValid = name !== '';
        var isBrandValid = brand !== '';
        var isPriceValid = !isNaN(price) && price > 0;
        var isCategoryValid = category !== "Select category";
        var isItemWeightValid = !isNaN(itemWeight) && itemWeight > 0;
        var isDescriptionValid = description !== '';
        // console.log(price);
        // console.log(itemWeight);
        var isPriceAndItemWeightValid = isPriceValid && isItemWeightValid;

        var isValid = isNameValid && isBrandValid && isPriceValid && isCategoryValid && isItemWeightValid && isDescriptionValid && isPriceAndItemWeightValid;

        // console.log('isValid:', isValid);
        // exit;

        // if (isValid) {
        //     // console.log("true");
        //     // exit;
        //     // field.style.borderColor = 'green';
        //     Swal.fire({
        //         icon: 'success',
        //         title: 'Product Added!',
        //         text: 'The product has been successfully added.',
        //         customClass: {
        //             popup: 'small-sweetalert'
        //         }
        //     });

            // Reset border colors after successful submission
            // resetBorderColor([nameField, brandField, priceField, categoryField, itemWeightField, descriptionField]);
        // } else {

        //     Swal.fire({
        //         icon: 'error',
        //         title: 'Validation Error',
        //         text: 'Please fill in all required fields correctly.',
        //         customClass: {
        //             popup: 'small-sweetalert'
        //         }
        //     });

        //     // Set red border color for blank fields
        //     setBorderColorIfEmpty(nameField, isNameValid);
        //     setBorderColorIfEmpty(brandField, isBrandValid);
        //     setBorderColorIfEmpty(priceField, isPriceValid);
        //     setBorderColorIfEmpty(categoryField, isCategoryValid);
        //     setBorderColorIfEmpty(itemWeightField, isItemWeightValid);
        //     setBorderColorIfEmpty(descriptionField, isDescriptionValid);
        // }

        var form = document.getElementById("addproduct");
        form.submit();
    });

    addProductButton.addEventListener("mouseover", function () {
        var name = document.getElementById("name").value;
        var brand = document.getElementById("brand").value;
        var price = document.getElementById("price").value;
        var category = document.getElementById("category").value;
        var itemWeight = document.getElementById("item-weight").value;
        var description = document.getElementById("description").value;

        // Validation checks
        var isNameValid = name !== '';
        var isBrandValid = brand !== '';
        var isPriceValid = !isNaN(price) && price > 0;
        var isCategoryValid = category !== "Select category";
        var isItemWeightValid = !isNaN(itemWeight) && itemWeight > 0;
        var isDescriptionValid = description !== '';
        // console.log(price);
        // console.log(itemWeight);
        var isPriceAndItemWeightValid = isPriceValid && isItemWeightValid;

        var isValid = isNameValid && isBrandValid && isPriceValid && isCategoryValid && isItemWeightValid && isDescriptionValid && isPriceAndItemWeightValid;

        isValid = name + brand + price + category + itemWeight + description;

        // console.log("dfs" + isValid);

        if (name && brand && price && category && itemWeight && description) {
            addProductButton.style.backgroundColor = "green";
            addProductButton.classList.remove("shake");
            addProductButton.classList.add("zoom");
        } else {
            addProductButton.style.backgroundColor = "red";
            addProductButton.classList.remove("zoom");
            addProductButton.classList.add("shake");
        }
    });

    addProductButton.addEventListener("mouseout", function () {
        // Reset the button color and remove the shake and zoom classes when the mouse is not over it
        addProductButton.style.backgroundColor = "";
        addProductButton.classList.remove("shake", "zoom");
    });

    function setBorderColorIfEmpty(field, isValid) {
        // Set the border color of the specified field if it is empty and not valid
        if (!isValid) {
            field.style.borderColor = 'red';
        } else {
            field.style.borderColor = 'green';
        }
    }
});