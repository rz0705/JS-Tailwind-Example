<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Starter</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    {{-- <script src="../js/script.js"></script> --}}
    {{-- <link rel="stylesheet" href="styles.css"> --}}
</head>

<body>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 mt-3 text-xl font-bold text-gray-900 dark:text-white">Add a new product</h2>
            <form action="{{ route('add-product') }}" method="POST" id="addproduct">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type product name">
                    </div>
                    <div class="w-full">
                        <label for="brand"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                        <input type="text" name="brand" id="brand" value="{{ old('brand') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Product brand">
                    </div>
                    <div class="w-full">
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="number" name="price" id="price" value="{{ old('price') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="$2999">
                    </div>
                    <div>
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="category" name="category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="" disabled {{ old('category') == '' ? 'selected' : '' }}>Select
                                Category</option>
                            <option value="TV" {{ old('category') == 'TV' ? 'selected' : '' }}>TV/Monitors</option>
                            <option value="PC" {{ old('category') == 'PC' ? 'selected' : '' }}>PC</option>
                            <option value="GA" {{ old('category') == 'GA' ? 'selected' : '' }}>Gaming/Console
                            </option>
                            <option value="PH" {{ old('category') == 'PH' ? 'selected' : '' }}>Phones</option>
                        </select>
                    </div>
                    <div>
                        <label for="item-weight"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item Weight
                            (kg)</label>
                        <input type="number" name="item-weight" id="item-weight" value="{{ old('number') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="12">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea rows="4" name="description" id="description"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Your description here">{{ old('description') }}</textarea>
                        <button id= "btn" type="button"
                            class="bg-neutral-400 hover:bg-sky-700 px-5 py-2 ml-60 mt-6 text-sm leading-5 rounded-full font-semibold text-white">
                            Add Product
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var addProductButton = document.getElementById("btn");

        addProductButton.addEventListener("click", function(event) {
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
            var isPriceValid = !isNaN(price) && price >= 0;
            var isCategoryValid = category !== "Select category";
            var isItemWeightValid = !isNaN(itemWeight) && itemWeight > 0;
            var isDescriptionValid = description !== '';
            // console.log(price);
            // console.log(itemWeight);
            var isPriceAndItemWeightValid = isPriceValid && isItemWeightValid;
            var isValid = isNameValid && isBrandValid && isPriceValid && isCategoryValid &&
                isItemWeightValid && isDescriptionValid && isPriceAndItemWeightValid;

            // console.log('isValid:', isValid);
            // exit;

            //swal
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
            //     // Reset border colors after successful submission
            //     resetBorderColor([nameField, brandField, priceField, categoryField, itemWeightField, descriptionField]);
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

            if(isValid){
            var form = document.getElementById("addproduct");
            form.submit();}
        });

        addProductButton.addEventListener("mouseover", function() {
            var name = document.getElementById("name").value;
            var brand = document.getElementById("brand").value;
            var price = parseFloat(document.getElementById("price").value);
            var category = document.getElementById("category").value;
            var itemWeight = parseFloat(document.getElementById("item-weight").value);
            var description = document.getElementById("description").value;

            // Validation checks
            var isNameValid = name !== '';
            var isBrandValid = brand !== '';
            var isPriceValid = !isNaN(price) && price > 0;
            var isCategoryValid = category !== "Select category";
            var isItemWeightValid = !isNaN(itemWeight) && itemWeight > 0;
            var isDescriptionValid = description !== '';

            var isPriceAndItemWeightValid = isPriceValid && isItemWeightValid;

            var isValid = isNameValid && isBrandValid && isPriceValid && isCategoryValid &&
                isItemWeightValid && isDescriptionValid && isPriceAndItemWeightValid;

            isValid = name + brand + price + category + itemWeight + description;

            // console.log("dfs" + isValid);

            if (name && brand && price && category && itemWeight && description) {
                addProductButton.style.backgroundColor = "green";
                addProductButton.classList.remove("shake");
                addProductButton.classList.add("zoom");
                addProductButton.style.cursor = 'auto';
            } else {
                addProductButton.style.backgroundColor = "red";
                addProductButton.classList.remove("zoom");
                addProductButton.classList.add("shake");
                addProductButton.style.cursor = 'not-allowed';
            }
        });

        addProductButton.addEventListener("mouseout", function() {
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

    @if (Session::has('success'))
        Swal.fire({
            icon: 'success',
            title: 'Product Added Successfully!!',
            text: "{{ Session::has('success') }}",
            customClass: {
                popup: 'small-sweetalert'
            }
        });
    @endif
</script>

</html>