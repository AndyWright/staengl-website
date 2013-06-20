$(document).ready(function() {

  // send external links to another tab
  $('.post-content a').attr('target','_blank');

  // clean up the modals
  $('#joinUsModal').bind('open', function() {
    $(this).find(".join-us-success").hide();
    $(this).find(".join-us-error").hide();
    $(this).find("#signUpButton").removeAttr('disabled');
  });

  $('#contactUsModal').bind('open', function() {
    $(this).find(".join-us-success").hide();
    $(this).find(".join-us-error").hide();
    $(this).find("#submitButton").removeAttr('disabled');
  });

  $("#joinUsForm").submit(function(event) {
    event.preventDefault();
    $("html").addClass('busy');

    var data = { email: $('input[name="email"]').val() },
        rvl = $('#joinUsModal'),
        frm = rvl.find('#joinUsForm'),
        btn = frm.find("#signUpButton");

    rvl.find(".join-us-success").hide();
    rvl.find(".join-us-error").hide();

    btn.attr('disabled','disabled');
    $.ajax({
      type: "POST",
      url: "/subscribe",
      processData: false,
      dataType: "json",
      contentType: "application/json",
      data: JSON.stringify(data),
      success: function(data) {
        $("html").removeClass('busy');
        var msg = frm.find('.join-us-success');
        msg.html("Thank you! You will hear from us soon.");
        msg.fadeIn(3333, function() {
          rvl.foundation('reveal', 'close');
        });
      },
      error: function(data){
        $("html").removeClass('busy');
        var json = JSON.parse(data.response),
            alrt = frm.find('.join-us-error');
        alrt.html(json.errors[0]);
        alrt.fadeIn(2000, function() {
          btn.removeAttr('disabled');
        });
      }
    });
    return false;
  });

  $("#contactUsForm").submit(function(event) {
    event.preventDefault();
    $("html").addClass('busy');

    var data = { name: $('input[name="yourName"]').val(),
          email: $('input[name="yourEmail"]').val(),
          message: $('textarea[name="yourMessage"]').val() },
        rvl = $('#contactUsModal'),
        frm = rvl.find('#contactUsForm'),
        btn = frm.find("#submitButton");

    rvl.find(".contact-us-success").hide();
    rvl.find(".contact-us-error").hide();

    btn.attr('disabled','disabled');
    $.ajax({
      type: "POST",
      url: "/contact-us",
      processData: false,
      dataType: "json",
      contentType: "application/json",
      data: JSON.stringify(data),
      success: function(data) {
        $("html").removeClass('busy');
        var msg = frm.find('.contact-us-success');
        msg.html("Thank you! You will hear from us soon.");
        msg.fadeIn(3333, function() {
          rvl.foundation('reveal', 'close');
        });
      },
      error: function(data){
        $("html").removeClass('busy');
        var json = JSON.parse(data.response),
            alrt = frm.find('.contact-us-error');
        alrt.html(json.errors[0]);
        alrt.fadeIn(2000, function() {
          btn.removeAttr('disabled');
        });
      }
    });
    return false;
  });

});

