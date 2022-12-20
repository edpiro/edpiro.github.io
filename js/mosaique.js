var listeImgFirstWorks = ["cinquiemescenario.png", "amazonas.png", "agence.png"];
var listeImgSecondWorks = ["whitefond.png"];
var nombreImgChargee = 0;
var paramStringToArray;
// 
function initGalerie(nomTableau) {

    if (nomTableau === "listeImgSecondWorks") {

        nombreImgChargee = 0;
        document.getElementById("content").innerHTML = "";
        paramStringToArray = window[nomTableau];



        for (var i = 0; i < paramStringToArray.length; i++) {
            // console.log(listeImgFirstWorks);
            let links = [""]

            // document.getElementById("content").innerHTML += '<div class="width50 mt-5 col-4 card text-black"><a href="' + links[
            //         i] + '" target="_blank"><img src="images/' +
            //     paramStringToArray[i] + '" class="img-resp img-galerie card-img"><div class="card-img-overlay"><h5>Savoir plus...</h5></div></a></div>';

            // modify here when adding a project
            // document.getElementById("content").innerHTML += '<div class="width50 mt-5 col-12 col-md-6 col-lg-4 container1"><img src="img/' + paramStringToArray[i] + '" class="img-resp img-galerie image img-fluid"><div class="middle"><a target="_blank" href="' + links[i] + '"><div class="text rounded">En savoir plus</div></a></div></div>';
            // and erase here 
            document.getElementById("content").innerHTML += '<div class=""><img src="img/' + paramStringToArray[i] + '" class="img-resp img-galerie image img-fluid"><div class=""><a target="_blank" href="' + links[i] + '"><div class=""></div></a></div></div>';

        }
        document.getElementById("content").innerHTML += '<div class="width50 mt-5 col-12 col-md-6 col-lg-4 container1"><div class="card card-body pb100"><a href="github.com/jeseduardopi"><div class="locked align-items-center h-en"><h6 class="text-center">Site web application</h6><div class="row mt-5 text-center"> <i class="fa fa-lock col mt-5" aria-hidden="true"></i></div><div class="col-8 mt-2 ml-5"><h4 class="text-center">En cours de développement</h4></div></div></div><div class="middle"><a href="portfolio.php"><div class="text rounded">Bientôt !</div></a></div></div>';
    } else if (nomTableau === "listeImgFirstWorks") {

        nombreImgChargee = 0;
        document.getElementById("content").innerHTML = "";
        paramStringToArray = window[nomTableau];
        for (var i = 0; i < paramStringToArray.length; i++) {
            // console.log(listeImgFirstWorks);
            let links = ["https://cinquiemescenario.com",
                "http://amazonas.epizy.com",
                "http://jeseduardopi.epizy.com/agence.com/"
            ]

            document.getElementById("content").innerHTML += '<div class="w-50 col-12 col-md-6 col-lg-4 container1"><img src="img/' + paramStringToArray[i] + '" class="img-resp img-galerie img-fluid image"><div class="middle"><a href="' + links[i] + '" target ="_blank"><div class="text rounded">Voir le site</div></a></div></div>';
        }
    }


    addListenerToImg();
}
// PROBLEMATIQUE : LES IMAGES NE SERONT PAS CHARGE EN MEME TEMPS ET LES IMAGES NE SONT PAS DANS LA MEME TAILLE
// LA SOLUTION SERA CREER UN ECOUTEUR D'EVENEMENTS POUR REDIMENSIONER
function addListenerToImg() {
    var allImg = document.getElementsByClassName('img-galerie');
    // console.log(allImg);
    for (var i = 0; i < allImg.length; i++) {
        allImg[i].addEventListener("load", chargementImgFiniHandler);
    }
};
// PROBLEME DE REDIMENSIONEMENT QUAND LA FENETRE EST PLUS PETIT (LA SOLUTION EST EN LIGNE 165)--> window.onresize = dimensionImage;
function chargementImgFiniHandler() {
    nombreImgChargee++;
    // console.log("nombreImgChargee=", nombreImgChargee);
    if (nombreImgChargee == paramStringToArray.length) {
        dimensionImage();
    }
}

function dimensionImage() {
    var allImg = document.getElementsByClassName("img-galerie");
    var h = 0;
    for (var i = 0; i < allImg.length; i++) {
        if (allImg[i].clientHeight > h) {
            h = allImg[i].clientHeight;
            console.log("nouvelle hauteur identifie :", h)
        }
    }
    console.log("Hauteur finale retenue :", h)
    for (var i = 0; i < allImg.length; i++) {
        if (allImg[i].clientHeight < h) {
            allImg[i].style.height = Math.ceil(h) + "px";
            allImg[i].style.width = "auto";
            // PROBLEMATIQUE : LES MARGINS SE PERDENT QUAND ON CHANGE LA TAILLE DE FENETRE ALORS ON NE PLUS RESPONSIVE
            // SOLUTION : IL FAUDRA CHANGER LA CLASSE IMG-FLUID POUR UNE CLASSE QU'ON APPELERA .IMG-RESP AVEC UN WIDTH: 100% et HEIGHT: AUTO.
            // PROBLEMATIQUE : LES IMAGES DEPASSERONT LEUR PARENTS (PLUS GRANDS QUE LE CONTENEURS)
            // ON UTILISE LA PROPRIETE OVERFLOW ET ON L'AJOUTERA A #MOSAIQUE WIDTH50 DANS LE CSS
            // PROBLEMATIQUE : QUAND ON ETIRE LE NAVIGATEUR ET ON LE METS PLUS PETIT ALORS LES IMAGES PERDENT MARGIN INTERIEUR ET ILS NE SONT PLUS CENTRE.
            // SOLUTION
            // On recupere la largeur des images avant transformation
            var largeurImage = allImg[i].clientWidth;
            var largeurParent = allImg[i].parentNode.clientWidth;
            console.log("largeurImage=", largeurImage);
            console.log("largeurParent=", largeurParent);
            var marginLeft = (largeurImage - largeurParent) / 2;
            allImg[i].style.marginLeft = -marginLeft + "px";
        }
    }
};
initGalerie("listeImgSecondWorks");
initGalerie("listeImgFirstWorks");

window.onresize = dimensionImage;