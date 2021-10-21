let rPicker = document.querySelector("#start_spiner");

rPicker.addEventListener("click", function () {
    let search = document.querySelector("[name=search]").value;
    console.log(search.replace(/\r?\n|\r/g, " ").split(','));
});
