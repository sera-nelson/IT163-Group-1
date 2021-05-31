<?php

$_SESSION['headersearch'] = $headSearch;


?>
<div class="navbar-item">
    <form action="BookList.php" method="get">
        <label class="m-1 mr-4 sr-only" for="headersearch">Search</label>
        <div class="field m-0">
            <div class="control has-icons-right">
                <input type="text" id="headersearch" name="headersearch" class="input has-text-centered has-text-dark" placeholder="Search">
                <span class="icon is-right"><i title="search" class="fas fa-search"></i></span>
            </div>
        </div>                               
    </form>
</div>