$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

$(document).ready(function() {
    $('dropdown-toggle').dropdown()
});

$(document).ready(function(){
    $("#close-button").click(function(){
        $("#prompt-message").fadeOut(400);
    });
});

function openNav() {
    document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}

function openNav1() {
    document.getElementById("myNav1").style.width = "100%";
}

function closeNav1() {
    document.getElementById("myNav1").style.width = "0%";
}


$('#back-to-top').on('click', function (e) {
    e.preventDefault();
    $('html,body').animate({
        scrollTop: 0
    }, 550);
});

$(document).ready(function(){
  $("select[name=status]").change(function(){
      var remarks = $(this).val();

      if(remarks == '0')
      {
          $("textarea[name=admin-remarks]").removeAttr("disabled");
      }

      else
      {
          $("textarea[name=admin-remarks]").attr("disabled", true);
      }

  });
});

$(document).ready(function(){
  $("select[name=statusforms]").change(function(){
      var remarks = $(this).val();

      if(remarks == '1'|| '0')
      {
          $("textarea[name=admin-remarks]").removeAttr("disabled");
      }

      else
      {
          $("textarea[name=admin-remarks]").attr("disabled", true);
      }

  });
});

updateList = function() {
  var input = document.getElementById('file');
  var output = document.getElementById('fileList');

  output.innerHTML = '<p style="float: right;">';
  for (var i = 0; i < input.files.length; ++i) {
    output.innerHTML += '<span class="glyphicon glyphicon-file" aria-hidden="true"></span>&nbsp;<small> ' + input.files.item(i).name + '</small>';
  }
  output.innerHTML += '</p>';
}


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

$('#delete-modal-1').on('show.bs.modal', function(e) {
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
          window.location.href = "http://localhost/pgevCI/user_ticketing/emergency_ticket";
      }
}

$(function () {
    $('#datetimepicker1').datetimepicker({
      format: 'MM/DD/YYYY LT'
    });
    $('#datetimepicker1').datetimepicker('showClear', true);
});

$(function () {
  var dateToday = new Date();
    $('#datetimepicker2').datetimepicker({
      format: 'MM/DD/YYYY',
      minDate: dateToday,
    });
    $('#datetimepicker2').datetimepicker('showClear', true);
});

$(function () {
  $('#datetimepicker4').datetimepicker({
    format: 'MM/DD/YYYY'
  });
  $('#datetimepicker4').datetimepicker('showClear', true);
});

$('<div class="box-wrap clearfix"></div>').insertAfter('.box');

$(".information-add").click(function() {
  window.location = $(this).find("a").attr("href");
  return false;
});

$('#hide-button').click(function(){
    var $this = $(this);
    $this.toggleClass('btn');
    if($this.hasClass('btn')){
      $('#reservation-table').show(400);
      $this.text('Hide Reservations');
      localStorage.setItem('show', 'false'); //store state in localStorage
    } else {
      $('#reservation-table').hide(400);
      $this.text('Show Reservations');
    }
});

$(document).ready(function(){
    var show = localStorage.getItem('show');
    if(show == 'false'){
        $("#hide-button").html('Hide Reservations');
        $('#reservation-table').show();
    } else if (show != 'false') {
      $('#reservation-table').hide();
    }
});

var password = document.getElementById("user-password")
  , confirm_password = document.getElementById("confirm-password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
