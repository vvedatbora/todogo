<?php 
 include 'header2.php';
?>
  <!-- End Navbar -->
  <div class="squares square1"></div>
  <div class="squares square2"></div>
  <div class="squares square3"></div>
  <div class="squares square4"></div>
  <div class="squares square5"></div>
  <div class="squares square6"></div>
  <div class="page-header">
    <div class="page-header-image"></div>
    <div class="container">
      <div class="col-lg-5 col-md-8 mx-auto">
        <div class="card card-login">
          
            <div class="card-header">
              <img class="card-img" src="../assets/img/square-purple-1.png" alt="Card image">
              <h4 class="card-title">Giriş</h4>
            </div>
            <?php 
            if(isset($_POST['giris'])){
              $email = $_POST['txtemail'];
              $password = $_POST['txtpw'];
              $mailal=$db->prepare("SELECT * FROM uye WHERE email=?");
              $mailal ->execute(array($email));
                if($mailal->rowCount()){
                    foreach ($db->query("SELECT * FROM uye WHERE email='$email'")as $recvUserDatas) {
                        $current_password=$recvUserDatas['pw'];
                        $id = $recvUserDatas['kid'];
                      
                        if($password==$current_password){
                          header('Refresh: 0.5 ; ../index_2.php');
                          $_SESSION['user'] = $id;
                        }else{
                  header('Refresh: 0.5 ; ../index.php');
                }
                    }
                }
                }
                

             ?>
            <form class="form" method="post" action="">
            <div class="card-body">
              <div class="input-group input-lg">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="tim-icons icon-single-02"></i></span>
                </div>
                <input type="text" class="form-control" name="txtemail" placeholder="E-Mail...">
              </div>
              <div class="input-group input-lg">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="tim-icons icon-caps-small"></i></span>
                </div>
                <input type="password" name="txtpw" class="form-control" placeholder="Şifre...">
              </div>
            </div>
            <div class="card-footer text-center">
              <button type="submit" name='giris' class="btn btn-primary btn-round btn-lg btn-block">Gönder</button>
            </div>
            <div class="pull-left ml-3 mb-3">
              <h6>
                <a href="register-page.php" class="link footer-link">Hesap Oluştur</a>
              </h6>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="../assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for the Carousel, full documentation here: http://kenwheeler.github.io/slick/ -->
  <script src="../assets/js/plugins/slick.js" type="text/javascript"></script>
  <!--  Plugin for the blob animation -->
  <script src="../assets/js/plugins/anime.min.js" type="text/javascript"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <!-- Control Center for Black UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="https://demos.creative-tim.com/blk-design-system-pro/assets/js/blk-design-system-pro.min.js" type="text/javascript"></script>
  <!-- Sharrre libray -->
  <script src="../assets/demo/jquery.sharrre.js"></script>
  <script>
    $(document).ready(function() {

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
