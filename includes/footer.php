</main>
    </div> <!--end content div -->    
    <hr class="has-background-warning m-0">
        <footer class="footer has-background-info-light p-5 m-0">
            <div class="columns has-text-centered">
                <div class="column">
                    <ul>
                        <li><b>&copy; the bookshelf 2021</b></li>
                        <!--TODO: INSERT LINKS TO PORTFOLIOS?-->
                        <li>Hannah Eberts | Design</li>
                        <li>Rory Hackney | Front End</li>
                        <li>Dominick Nelson | Back End</li>
                    </ul>
                </div>
                <div class="column">
                <!--social media icons-->
                    <ul>
                        <li><b>connect</b></li>
                        <li><a class="inv" href="mailto:info@thebookshelf.com">info@thebookshelf.com</a></li>
                        <li>
                            <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook fa-2x" title="Facebook icon"></i></a>
                            <span class="is-sr-only">Facebook icon</span>
                            <a href="https://www.facebook.com/messenger" target="_blank"><i class="fab fa-facebook-messenger fa-2x" title="Facebook Messenger icon"></i></a>
                            <span class="is-sr-only">Facebook Messenger icon</span>
                            <a href="https://www.pinterest.com" target="_blank"><i class="fab fa-pinterest fa-2x" title="Pinterest icon"></i></a>
                            <span class="is-sr-only">Pinterest icon</span>
                            <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram-square fa-2x" title="Instagram icon"></i></a>
                            <span class="is-sr-only">Instagram icon</span>
                            <a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter-square fa-2x" title="Twitter icon"></i></a>
                            <span class="is-sr-only">Twitter icon</span>
                        </li>
                    </ul>
                    <div onload="setTimer()">
                        <p id="timer">You have been on this page for 0 seconds!</p>
                    </div>
                </div>
                <div class="column">
                    <ul>
                        <li><b>account</b></li>
                        <?php include 'includes/loginfooter.php'; ?>
                    </ul>
                </div>
            </div> <!-- end columns div -->
        </footer>
        <!--load Jquery-->
        <script
			  src="https://code.jquery.com/jquery-3.6.0.min.js"
			  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			  crossorigin="anonymous">
        </script>
        <script src="clickfunctions.js"></script> <!--load our javascript file-->
    </body>
</html>