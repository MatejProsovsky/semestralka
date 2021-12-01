function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}
function menuButton() {
    let w = window.innerWidth;
    let con = document.querySelector(".container");
    let grd = document.querySelector(".grid");
    let grd1 = document.querySelector(".grid>article:nth-child(1)");
    if (w < 845) {
        con.style.width = "90vw";
        grd.style.gridTemplateColumns = "repeat(1, minmax(100px, 1fr))";
        grd1.style.gridColumn = "span 1 ";
    } else {
        con.style.width = "65vw"
        grd.style.gridTemplateColumns = "repeat(auto-fill, minmax(200px, 1fr))";
        grd1.style.gridColumn = "span 2 ";
    }
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
