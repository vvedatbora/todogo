<?php 
include ('db.php');
$rows = $db->prepare("SELECT * FROM todo WHERE kid=?");
$rows->execute(array($_SESSION['user']));
$rows = $rows->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['logout'])){
  session_destroy();
  header('Location:/todogoo');
}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">

  <title>
    TODOGO
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/style.min.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
  </script>
  <!-- End Google Tag Manager -->
</head>

<body class="index-page">
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>
  <!-- End Google Tag Manager (noscript) -->
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg  fixed-top navbar-transparent " color-on-scroll="300">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="index_2.php" rel="tooltip" title="Plan Hayatı Kolaylaştırır." data-placement="bottom">
          <span>TODOGO•</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-close text-right">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav ml-auto">
         
          <li class="nav-item">
            <a class="nav-link btn btn-sm btn-default" href="?logout">
              <p>Çıkış Yap</p>
            </a>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Menü Bitiş -->
  <div class="wrapper">
    <div class="page-header">
      <div class="squares square1"></div>
      <div class="squares square2"></div>
      <div class="squares square3"></div>
      <div class="squares square4"></div>
      <div class="squares square5"></div>
      <div class="squares square6"></div>
      <div class="squares square7"></div>
      <div class="container">

             <table class="table table-pricing">
                            <tbody>
                              <!-- GOREV EKLEME -->
                              <?php 
                                  if($_POST){
                                    $gorev = $_POST["gorev"];
                                    $insert = $db->prepare("INSERT INTO todo SET gorev=?,kid=?");
                                    $result= $insert->execute(array($gorev,$_SESSION['user']));
                                    if ($result) {
                                      header("Refresh:0.1");
                                    }
                                  }
                               ?>
                               <!-- ---------- -->
                            <form action="" method="post">
                              <tr>
                                <td>
                                  <input type="text" class="form-control" name="gorev" placeholder="Görev Ekle" >
                                  <button type="submit" class="btn btn-link btn-warning">Ekle</button>
                                </td>
                              </tr>
                            </form>
                              <tr class="bg-primary">
                                <td class="text-white">
                                  <b>Görevler</b>
                                </td>

                                <td>
                                  <b></b>
                                </td>
                                    <td>
                                    </td>
                                        <td>
                                          <b></b>
                                        </td>
                                            <td>
                                              <b>Düzenle</b>
                                            </td>
                              </tr>
                              <tr>
                          <?php foreach ($rows as $row) { ?>
                                <td>
                                 <textarea class="form-control" name="name" rows="4" cols="50"><?php echo $row["gorev"]; ?></textarea>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                  <!--Durum-->
                                    
                                </td>
                                <td>
                                  <a href="sil.php?i= <?php echo $row['id'] ?>" class="btn btn-link btn-warning">Sil</a>
                               </a>
                                </td>
                              </tr>
                            <?php } ?>  
                            </tbody>
                          </table>
              </div>
      </div>

    </div>

    </div>


  <!--   Core JS Files   -->

  <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for the Carousel, full documentation here: http://kenwheeler.github.io/slick/ -->
  <script src="assets/js/plugins/slick.js" type="text/javascript"></script>
  <!--  Plugin for the blob animation -->
  <script src="assets/js/plugins/anime.min.js" type="text/javascript"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <!-- Control Center for Black UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="https://demos.creative-tim.com/blk-design-system-pro/assets/js/blk-design-system-pro.min.js" type="text/javascript"></script>
  <!-- Sharrre libray -->
  <script src="assets/demo/jquery.sharrre.js"></script>
  <script>
    $(document).ready(function() {

      $('.check').on('click',function(){
        $.ajax({
          url:'#',
          data:'id='+$(this).data('id'),
          method:'POST'
        });
      })

      // Facebook Pixel Code Don't Delete
      ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
          n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
      }(window,
        document, 'script', '//connect.facebook.net/en_US/fbevents.js');

      try {
        fbq('init', '111649226022273');
        fbq('track', "PageView");

      } catch (err) {
        console.log('Facebook Track Error:', err);
      }


      //
      //

    });
  </script>
  <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
  </noscript>
  <script>
    


    $(document).ready(function() {
      blackKit.initDatePicker();
      blackKit.initSliders();
    });

    function scrollToDownload() {

      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }
    $('#twitter').sharrre({
      share: {
        twitter: true
      },
      enableHover: false,
      enableTracking: false,
      buttons: {
        twitter: {}
      },
      click: function(api, options) {
        api.simulateClick();
        api.openPopup('twitter');
      },
      template: '<i class="fab fa-twitter"></i>',
      url: 'http://demos.creative-tim.com/blk-design-system/index.html'
    });

    $('#facebook').sharrre({
      share: {
        facebook: true
      },
      buttons: {
        facebook: {}
      },

      enableHover: false,
      enableTracking: false,
      click: function(api, options) {
        api.simulateClick();
        api.openPopup('facebook');
      },
      template: '<i class="fab fa-facebook-square"></i>',
      url: ' http://demos.creative-tim.com/blk-design-system/index.html'
    });
  </script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-pro"
      });
  </script>
</body>

</html>
