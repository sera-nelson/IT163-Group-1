//modal and dropdown implementation tests
$(document).ready(function(){
    let drop = document.querySelector('.dropdown');
    drop.addEventListener('click', (event) => {
        event.stopPropagation();
        drop.classList.toggle('is-active');
    });

    let modal = document.querySelector('.modal-trigger');
    let pop = document.querySelector('.modal');
    let close = document.querySelector('.delete');
    let outside = document.querySelector('.modal-background');
    let confirm=document.querySelector('#submitModal');
    let cancel=document.querySelector('.is-warning');

    modal.addEventListener('click', (event) => {
        pop.classList.toggle('is-active');
    });
    close.addEventListener('click', (event) => {
        pop.classList.toggle('is-active');
    });
    confirm.addEventListener('click', (event) => {
        pop.classList.toggle('is-active');
    });
    cancel.addEventListener('click', (event) => {
        pop.classList.toggle('is-active');
    });
    window.addEventListener('click', (event) => {
        if(event.target === outside){
            pop.classList.toggle('is-active');
        }
    });
}); //end doc ready


//NEW BOOK SCRIPTS
//For Author
$(document).ready(function(){
    $("#search-box").keyup(function(){
        $.ajax({
        type: "POST",
        url: "includes/readName.php",
        data:'keyword='+$(this).val(),
        success: function(data){
            $("#suggesstion-box").show();
            $("#suggesstion-box").html(data);
            $("#search-box").css("background","#FFF");
        }
        });
    });
}); //end doc ready

function selectName(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
function nameID(val) {
$("#authorID").val(val);
}

//For Genre
$(document).ready(function(){
    $("#search-box-genre").keyup(function(){
        $.ajax({
        type: "POST",
        url: "includes/readGenre.php",
        data:'genrekeyword='+$(this).val(),
        success: function(data){
            $("#suggesstion-box-genre").show();
            $("#suggesstion-box-genre").html(data);
            $("#search-box-genre").css("background","#FFF");
        }
        });
    });
}); //end doc ready

function selectGenre(val) {
$("#search-box-genre").val(val);
$("#suggesstion-box-genre").hide();
}
function genreID(val) {
$("#genreID").val(val);
}

//NEW REVIEW SCRIPTS
//For Book
$(document).ready(function(){
    $("#search-box-book").keyup(function(){
        $.ajax({
        type: "POST",
        url: "includes/readTitle.php",
        data:'bookkeyword='+$(this).val(),
        success: function(data){
            $("#suggesstion-box-book").show();
            $("#suggesstion-box-book").html(data);
            $("#search-box-book").css("background","#FFF");
        }
        });
    });
}); //end doc ready

function selectBook(val) {
$("#search-box-book").val(val);
$("#suggesstion-box-book").hide();
}
function bookID(val) {
$("#bookID").val(val);
}

//timer scripts (in footer of all pages)
var time = 0;
var checkTime;
setTimer();

function timer(){
    checkTime = setTimeout(setTimer, 1000);
}
function setTimer(){
    time = time + 1;
    document.getElementById("timer").innerHTML = "You have been on this page for " + time + " seconds!";
    timer();
}

winPrize();
function winPrize(){ //1 in 10 chance to win prize when entering index page
    var pChance = 0;
    prizeTimer();

    function prize(){
        alert("You have won a prize!");
    }
    
    function prizeTimer(){
    checkTime = setTimeout(prizeChance, 1000);
    }
    
    function prizeChance() {
        var x = Math.floor(Math.random() * 10 + 1);
        pChance = x;
        document.getElementById("ptimeTest").innerHTML = pChance;
        if(pChance == 10){
            prize();
        }
    }
}


var ani = null;
function aniLogo(){ 
    var x = document.getElementById('logo');
    var i = 0;
    clearInterval(ani);
    ani = setInterval(spin, 10);
    function spin() {
        if (360 <= i) {
            clearInterval(ani);
        } else {
            i = i + 1; 
            x.setAttribute("style", "transform: rotate(" + i + "deg);");
        }
    }
}
function unAniLogo(){ 
    var x = document.getElementById('logo');
    clearInterval(ani);
    x.setAttribute("style", "transform: rotate(0deg);");
}

//modal popup checker
$(document).ready(function(){
    //select modal DOM elements
    let modal = document.querySelector('.modal-trigger');
    let pop = document.querySelector('.modal');
    let close = document.querySelector('.delete');
    let outside = document.querySelector('.modal-background');
    let confirm=document.querySelector('#submitModal');

    //show/hide modal on click
    modal.addEventListener('click', (event) => {
        pop.classList.toggle('is-active');
    });
    close.addEventListener('click', (event) => {
        pop.classList.toggle('is-active');
        closePopup();
    });
    confirm.addEventListener('click', (event) => {
        pop.classList.toggle('is-active');
        closePopup();
    });
    window.addEventListener('click', (event) => {
        if(event.target === outside){
            pop.classList.toggle('is-active');
            closePopup();
        }
    });

    //check if popup has happened before using cookies
    let check = cookieCheck.includes("noPopup");
    if(check){
        document.cookie = "popupCheck = noPopup";
        cookieCheck = decodeURIComponent(document.cookie);
    } else {
        modalPopup();
    }


    function modalPopup(){
        //make modal visible, set cookies to prevent more popups
        pop.classList.toggle('is-active');
        document.cookie = "popupCheck = noPopup";
        cookieCheck = decodeURIComponent(document.cookie);
    }
}); //end doc ready

function closePopup(){
    //set cookies to prevent more popups
    document.cookie="popupCheck = noPopup";
    cookieCheck = decodeURIComponent(document.cookie);
    modalBox();
}

function modalBox(){
    //value of modal inputs
    let favAuthor = document.getElementById('favAuthor').value;
    let favGenre = document.getElementById('favGenre').value;
    let favBook = document.getElementById('favBook').value;
    //div of searches to modal inputs
    let authorPopup = document.getElementById('authorPopup');
    let genrePopup = document.getElementById('genrePopup');
    let titlePopup = document.getElementById('titlePopup');
    //set div content to search=modal input
    authorPopup.innerHTML = "books by " + favAuthor;
    genrePopup.innerHTML = favGenre + " books";
    titlePopup.innerHTML = "reviews about " + favBook;
    //set div to be visible
    let x = document.getElementById('popupSearchBox');
    x.setAttribute("style", "display: block;");
}

function modalAuthSearch(){
    //search by favorite author
    let favAuthor = document.getElementById('favAuthor').value;
    let x = document.getElementById('popupSearch');
    x.setAttribute("value", favAuthor);
    window.location.href='reviews.php?param=AuthorParam&searchBar=' + favAuthor;
}
function modalGenreSearch(){
    //search by favorite genre
    let favGenre = document.getElementById('favGenre').value;
    let x = document.getElementById('popupSearch');
    x.setAttribute("value", favGenre);
    window.location.href='reviews.php?param=GenreParam&searchBar=' + favGenre;
}
function modalTitleSearch(){
    //search by favorite title
    let favBook = document.getElementById('favBook').value;
    let x = document.getElementById('popupSearch');
    x.setAttribute("value", favBook);
    window.location.href='reviews.php?param=TitleParam&searchBar=' + favBook;
}
//reset cookies for testing
function popupReset(){
    document.cookie = "popupCheck = yesPopup";
    cookieCheck = decodeURIComponent(document.cookie);
}
//dark mode toggle
var toggle = document.getElementById('mode');
var body = document.body;
toggle.addEventListener("click", modeToggle, false);

var cookieCheck = decodeURIComponent(document.cookie);
$(document).ready(function(){
    var check = cookieCheck.includes("Dark");
    if (check){
        modeToggle();
    }
});

function modeToggle() {
    if(toggle.innerText === "Light Mode"){
        toggle.innerText = "Dark Mode";
        body.classList.toggle("invert");
        document.cookie = "modeCookie = Light"
        cookieCheck = decodeURIComponent(document.cookie);
    } else {
        toggle.innerText = "Light Mode";
        body.classList.toggle("invert");
        document.cookie = "modeCookie = Dark"
        cookieCheck = decodeURIComponent(document.cookie);
    }
}