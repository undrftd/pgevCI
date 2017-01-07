<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>

    <script>

        function undisableField() {
            document.getElementById("myFieldset").disabled = false;
            var elem = document.getElementById("edit-button");
            if (elem.value=="Edit") elem.value = "Save Changes";
            $("#edit-button").click(function(){
                $("#edit-button").hide();
            });
        }

    </script>

    <script>

        $(document).ready(function(){
            $("#edit-button").click(function(){
                $("#saveButton").show();
            });
        });

    </script>

    <script>

        $(document).ready(function(){
            $("#close-button").click(function(){
                $("#prompt-message").fadeOut(400);
            });
        });

    </script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js">
        $('#myModal').modal() // initialized with defaults
    </script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

  </body>
</html>
