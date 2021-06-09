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
    let confirm=document.querySelector('.is-success');
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
    var check = cookieCheck.includes("noPopup");
    if (check){
        document.cookie = "popupCheck = noPopup";
        cookieCheck = decodeURIComponent(document.cookie);
    }
    else{
        modalPopup();
    }
});

function modalPopup(){
    var x = document.getElementById('popup');
    x.setAttribute("style", "display: block;");
    document.cookie = "popupCheck = noPopup";
    cookieCheck = decodeURIComponent(document.cookie);
}
function closePopup(){
    var x = document.getElementById('popup');
    x.setAttribute("style", "display: hidden;");
    document.cookie = "popupCheck = noPopup";
    cookieCheck = decodeURIComponent(document.cookie);
}
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