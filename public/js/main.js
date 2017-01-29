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

////////////////////////////////////////////////

function myFunction() {
  var ask = window.confirm("Warning: This ticket is solely used for emergenices such as: Fire, Robbery, Broken House Tubes, and Suspicious People that may cause trouble. If it is not in the categories provided, the ticket will be disregarded. \n\nKindly click OK to continue your request.");
      if (ask) {
          document.location.href = "user_ticketing/emergency_ticket";
      }
}

$(function () {
    $('#datetimepicker1').datetimepicker({
      format: 'MM-DD-YYYY LT'
    });
    $('#datetimepicker1').datetimepicker('showClear', true);
});

$(function () {
  $('#datetimepicker4').datetimepicker({
    format: 'MM-DD-YYYY'
  });
  $('#datetimepicker4').datetimepicker('showClear', true);
});

$('<div class="box-wrap clearfix"></div>').insertAfter('.box');
