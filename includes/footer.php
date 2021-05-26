        </main>

        <hr class="has-background-warning m-0">
        <footer class="footer has-background-info p-3 pb-5 m-0">
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
                        <li><a href="mailto:info@thebookshelf.com">info@thebookshelf.com</a></li>
                        <li><i class="fab fa-facebook fa-2x" title="Facebook icon"></i>
                        <span class="is-sr-only">Facebook icon</span>
                        <i class="fab fa-facebook-messenger fa-2x" title="Facebook Messenger icon"></i>
                        <span class="is-sr-only">Facebook Messenger icon</span>
                        <i class="fab fa-pinterest fa-2x" title="Pinterest icon"></i>
                        <span class="is-sr-only">Pinterest icon</span>
                        <i class="fab fa-instagram-square fa-2x" title="Instagram icon"></i>
                        <span class="is-sr-only">Instagram icon</span>
                        <i class="fab fa-twitter-square fa-2x" title="Twitter icon"></i>
                        <span class="is-sr-only">Twitter icon</span></li>
                    </ul>
                </div>
                <div class="column">
                    <ul>
                        <li><b>account</b></li>
                        <?php include 'includes/loginfooter.php'; ?>
                    </ul>
                </div>
            </div>
            <script>
                var time = 0;
                var checkTime;
                
                    setTimer();
                    function timer(){
                        checkTime = setTimeout(setTimer, 1000);
                    }
                    function setTimer(){
                        time = time + 1;
                        document.getElementById("timer").innerHTML = time;
//                        timer();
                    }
                
            </script>
            <div onload="setTimer()">
                <p id="timer">You have been on this page for 0 seconds!</p>
            </div>
        </footer>
        <!--load Jquery-->
        <script
			  src="https://code.jquery.com/jquery-3.6.0.min.js"
			  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			  crossorigin="anonymous">
        </script>
        <script src="clickfunctions.js"></script>
        <script>
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

        </script>
    </body>
</html>