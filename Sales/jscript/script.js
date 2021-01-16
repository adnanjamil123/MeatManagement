const $btnPrint = document.querySelector("#btnPrint");
window.print();
$btnPrint.addEventListener("click", () => {
    window.print();
});