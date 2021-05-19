<?php 
include('includes/config.php');
include('includes/header.php'); 
?>

    <div class="content">
        
        <?php
        include('includes/reviewSearch.php');

        ?>
        <aside>

        <?php

        if($Feedback == ''){
            echo '';
        } else {
            echo $Feedback;
        }

        ?>
        </aside>
    </div>

        <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script>
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
        </script>
<?php include 'includes/footer.php'; ?>