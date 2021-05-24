window.addEventListener('load', (event) => {
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
}); //end window onload


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
});

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
});

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
});

function selectBook(val) {
$("#search-box-book").val(val);
$("#suggesstion-box-book").hide();
}
function bookID(val) {
$("#bookID").val(val);
}