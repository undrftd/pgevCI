$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

$(document).ready(function(){
    $("#close-button").click(function(){
        $("#prompt-message").fadeOut(400);
    });
});

$('#myModal').modal() // initialized with defaults

function undisableField() {
  document.getElementById("myFieldset").disabled = false;
  var elem = document.getElementById("edit-button");
  if (elem.value=="Edit") elem.value = "Save Changes";
  $("#edit-button").click(function(){
      $("#edit-button").hide();
  });
}

$('#delete-modal').on('show.bs.modal', function(e) {
    $(this).find('.deleteclass').attr('href', $(e.relatedTarget).data('href'));
});

$(document).ready(function(){
    $("#edit-button").click(function(){
        $("#saveButton").show();
    });
});

$('#delete-modal').on('show.bs.modal', function(e) {
    $(this).find('.btn-custom-1').attr('href', $(e.relatedTarget).data('href'));
});

$(document).ready(function () {
            //iterate through each textboxes and add keyup
            //handler to trigger sum event
            $(".txt").each(function () {
                $(this).keyup(function () {
                    calculateSum();
                });
            });
        });

function calculateSum() {
    var sum = 0;
    //iterate through each textboxes and add the values
    $(".txt").each(function () {
        //add only if the value is number
        if (!isNaN($(this).val()) && $(this).val().length != 0) {
            sum += parseFloat(this.value);
        }
    });

    //.toFixed() method will roundoff the final sum to 2 decimal places
    $("#sum").val(sum.toFixed(2));
}

function breakTime() { // <<< do not edit or remove this line!
/* Set Break Hour in 24hr Notation */
    var breakHour=16
    var startHour=8
    /* Set Break Minute */
    var breakMinute=30
    /* Set Break Message */
    var breakMessage="Hello, Homeowner! I'm sorry, but the administrators could only accommodate requests and complaints until 4:30 PM. Expect the ticket to be accommodated within the next working day. Thank you for your kind consideration. "
    ///////////////////No Need to Edit//////////////
    var theDate=new Date()
    if (Math.abs(theDate.getHours())>=breakHour||Math.abs(theDate.getHours())<=startHour&&Math.abs(theDate.getMinutes())!=breakMinute){
    this.focus();
    clearInterval(breakInt)
    alert(breakMessage)
      }
var breakInt=setInterval("breakTime()",500)
}
////////////////////////////////////////////////

function myFunction() {
  var ask = window.confirm("Warning: This ticket is solely used for emergenices such as: Fire, Robbery, Broken lube, and causes of mysterious person that may cause trouble. If it is not in the categories provided, the ticket will be disregarded. \n\nKindly click OK to continue your request.");
      if (ask) {
          document.location.href = "user-emergency.html";
      }
}
