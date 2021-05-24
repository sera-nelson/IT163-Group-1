<?php

$_SESSION['headersearch'] = $headSearch;


?>
    <form action="BookList.php" class="navbar-item" method="get">
        <label class="m-1 mr-4" for="headersearch">Search</label>
        <div class="field m-0">
            <div class="control has-icons-right">
                <input type="text" id="headersearch" name="headersearch" class="input has-text-centered" placeholder="Search">
                <span class="icon is-right"><i title="search" class="fas fa-search"></i></span>
            </div>
        </div>                               
    </form>