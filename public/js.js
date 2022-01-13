let sidenav = 0;

function openNav() {
    document.getElementById("mySidenav").style.width = "200px";
    sidenav = 1;
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

function showResult(str) {
    if (str.length==0) {
        document.getElementById("livesearch").innerHTML="";
        document.getElementById("livesearch").style.border="0px";
        return;
    }
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            document.getElementById("livesearch").innerHTML=this.responseText;
            document.getElementById("livesearch").style.border="1px solid #A5ACB2";
        }
    }
    xmlhttp.open("GET","?c=articles&a=findArticle&res="+str,true);
    xmlhttp.send();
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    sidenav = 0;
}

