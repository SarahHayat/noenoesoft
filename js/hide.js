let btn = document.getElementById("button");
let d2 = document.getElementById('form_candidat');
let d1 = document.getElementById('poste');
let d3 = document.getElementById("candidater");
btn.addEventListener("click", () => {
        btn.style.display = "none";
       d2.style.display = "block";
        d1.style.width = "50%";
        d3.style.display = "flex";
        d3.style.textAlign = "center";
        d2.style.margin = "0";

});