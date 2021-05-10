<?php include('includes/header.php'); ?>
<hr>



<section class="hero is-success is-halfheight">
            <div class="hero-body">
                <div>
                    <p class="title">The Bookshelf</p>
                    <p class="subtitle">Books and Reviews By And For You!</p>
                </div>
            </div>
        </section>
            <div class="columns">
                <div class="column is-half has-background-warning m-1">1</div>
                <div class="column has-background-warning m-1">2</div>
                <div class="column has-background-warning m-1">3</div>
            </div>

            <div class="box">
                <button class="button is-primary">Button</button>
            </div>

            <button class="button is-light modal-trigger">Modal</button>
            <div class="modal">
                <div class="modal-background"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Title</p>
                        <button class="delete" aria-label="close"></button>
                    </header>
                    <section class="modal-card-body">
                        <p>Some text...</p>
                    </section>
                    <footer class="modal-card-foot">
                        <button class="button is-warning">No</button>
                        <button class="button is-success">Yes</button>
                    </footer>
                </div>
            </div>

            <div class="dropdown">
                <div class="dropdown-trigger">
                    <button class="button is-dark" aria-haspopup="true" aria-controls="dropdown-menu3">
                        <span>Click Me</span>
                        <span class="icon is-small">
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>
                <div class="dropdown-menu" id="dropdown-menu3" role="menu">
                    <div class="dropdown-content">
                        <a href="index.php" class="dropdown-item">Home</a>
                        <a href="login.php" class="dropdown-item">Login</a>
                        <a href="" class="dropdown-item">Reviews</a>
                        <a href="BookList.php" class="dropdown-item">Books</a>
                        <a href="NewBook.php" class="dropdown-item">Add a Book</a>
                    </div>
                </div>
            </div>



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
    </body>
</html>