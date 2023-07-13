document.addEventListener("DOMContentLoaded", function () {
    const minusButton = document.querySelector(".minus");
    const plusButton = document.querySelector(".plus");
    const countInput = document.querySelector(".count");

    minusButton.addEventListener("click", function () {
        let count = parseInt(countInput.value);
        if (count > 1) {
            count--;
            countInput.value = count;
        }
    });

    plusButton.addEventListener("click", function () {
        let count = parseInt(countInput.value);
        count++;
        countInput.value = count;
    });
});
