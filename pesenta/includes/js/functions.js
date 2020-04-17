function change_status(x) {
  var slct_id = x.id;
  var slct_val = x.value;
  var paid_id = 'paid.' + slct_id;

  $.ajax({
    url: "refresh.php",
    type: "POST",
    data: {value: slct_val, id: slct_id},
    dataType: 'json',
    success: function (data) {
      var y = document.getElementById(paid_id);
      if (slct_val == "не платени") {
        slct_val = "";
      }
      y.innerHTML = slct_val;
      document.getElementById('tot_books').innerHTML = "Платени :" + data;
    },
    error: function () {
      alert("Опа, грешка. Нещо не е наред. Пробвайте пак и ако не стане - бийте един ctrl + F5 и ако пак нищо не стане пишета на бат Ал да види що така.");
    }
  })
}

jQuery(function ($) {
  $('.formichka').on('submit', function (e) {
    e.preventDefault();
    $('.oops').html = '';
    if (document.getElementById('username').value === '' || document.getElementById('password').value === '') {
      $('.oops').html('Моля, въведете име и парола');
      return false;
    }

    $.ajax({
      url: "login.php",
      type: "POST",
      data: {
        user: document.getElementById('username').value,
        pass: document.getElementById('password').value
      },
      success: function (data) {

        if (data == 0) {
          var tomorrow = (new Date(Date.now()+ 86400*1000)).toUTCString();

          document.cookie = "verybadpractice=loggedin; expires=" + tomorrow + "; path=/";
          //window.location.href = 'https://chobi.test/pesenta/results.php';
          window.location.href = 'https://choveshkata.net/blog/pesenta/results.php';
        }

        if (data == 2) {
          var err = '<p>ГРЕШКА! Брееей, май сте забравили паролата? Ако е тъй я драснете едно мейлче на <span class="mail">alexander.vasilev в pm точка me</span> да види бат Ал, да ви я препрати.</p>';
          $('.oops').html(err);
        }

        if (data == 1) {
          var err = '<p>ГРЕШКА! Чудно. Изглежда сте забравили да въведете я паролата, я потребителя</p>';
          $('.oops').html(err);
        }
        return false;
      },
      error: function (errorCode, xhr, message) {
        alert("Опа, грешка. Нещо не е наред. Пробвайте пак и ако не стане - бийте един ctrl + F5 и ако пак нищо не стане пишета на бат Ал да види що така." + message);
        return false;
      }
    });
    return false;
  });


  $('#submit-exit').on('click', function () {
    document.cookie = "verybadpractice=loggedin; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
    //window.location.href = 'https://chobi.test/pesenta/statistic.php';
    window.location.href = 'https://choveshkata.net/blog/pesenta/statistic.php';
  });

  $('.del').on('click', function() {
    if(!confirm('Сигурни ли сте, че искате да изтриете този ред?')) {
      return false;
    }
    var row = $(this).parent();
    $.ajax({
      url: "delete-entry.php",
      type: "POST",
      data: {
        id: $(this).data('id'),
      },
      success: function (data) {
        if (data == 1) {
          $(row).remove();
        } else {
          alert(data)
        }
      },
      error: function (xhr, status, error) {
        alert(error)
      }
    });
  });
});
