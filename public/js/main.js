if (document.querySelector(".random-picker")) {
    let rPicker = document.querySelector("#start_spiner");
    let clear = document.querySelector("#clear_spinner");
    let nilai = '';
    let eRPicker = document.querySelector(".random-picker");
    let loader = document.querySelector(".loader");
    let textLoading = document.querySelector(".loader span");
    let winner = document.querySelector(".winner");
    let nWinner = document.querySelector("#count");
    let resultWinner = [];
    let durasi = document.querySelector("#durasi");
    let pwinner = document.querySelector(".p-winner");
    rPicker.addEventListener("click", function (e) {
        e.target.classList.add("d-none");
        let search = document.querySelector("[name=search]").value;
        // console.log(search.replace(/\r?\n|\r/g, " ").split(','));
        nilai = search.replace(/\r?\n|\r/g, " ").split(',');
        eRPicker.classList.add("d-none");
        loader.classList.remove("d-none");
        let count = [];
        let interfal = setInterval(() => {
            textLoading.innerHTML = "loading " + `(${durasi.value--})`;
            // console.log(nilai[Math.floor(Math.random() * nilai.length)], Math.floor(Math.random() * nilai.length));
        }, 1000);
        setInterval(() => {
            if (resultWinner.length <= nWinner.value - 1) {
                let randomValue = Math.floor(Math.random() * nilai.length);
                if (!count.includes(randomValue)) {
                    resultWinner.push(nilai[randomValue]);
                }
                count.push(randomValue);
            }
        }, 200);
        setTimeout(() => {
            textLoading.innerHTML = "Treng treng...";
            clearInterval(interfal)
        }, (durasi.value * 1000));
        setTimeout(() => {
            let ni = 1;
            resultWinner.forEach((e) => {
                var node = document.createElement("P");
                node.className = "h6 text-primary";
                var textnode = document.createTextNode(`[${ni}]${e}`);
                node.appendChild(textnode);
                pwinner.appendChild(node);
                ni++;
            })
            loader.classList.add("d-none");
            winner.classList.remove("d-none");
        }, (durasi.value * 1000) + 2000);
    });
    clear.addEventListener("click", function () {
        location.reload();
    });

}




if (document.querySelector(".upload-img")) {
    let upImg = document.querySelectorAll(".upload-img");
    upImg.forEach((e) => {

        let imgPrev = document.querySelector(`.${e.dataset.target}`);
        e.addEventListener("change", function () {
            const oFReader = new FileReader();
            imgPrev.classList.remove("d-none");
            oFReader.readAsDataURL(e.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPrev.src = oFREvent.target.result;
            }
        })
    })
}
