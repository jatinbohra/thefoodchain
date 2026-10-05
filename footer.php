<html>
<head>
  <?php include("links.php"); ?>
</head>
<body>
<!--about coding part--><br>
  <div class="footer"style="color:white" id="About us" >
    <div class="end" style="overflow: hidden; display: inline-block;">
      <div id="part-1">
        <a target="_blank">
          <h4  data-toggle="tooltip" title="About Us" style="margin-bottom: 3px;">About Us</h4>
          <br>
          <lu type="square">
          <?php 
            error_reporting(0);
            if(!$_SESSION['name']){
              ?>
              <li><a href="create account.php" style="color: white;"  data-toggle="tooltip" title="Join us">Join us</a></li>
              <?php }
              else {
                ?><font size="5px;" style="color: green;">
                  welcome
                  <?php
                  echo $_SESSION["name"]; ?> !</font>
                  <li ><a href="user-logout.php"  style="color: white;">Logout</a></li><?php 
              }
              ?>

          
            <li style="color:white; cursor: pointer;" onclick="Func()" id="demo"  data-toggle="tooltip" title="Services">Services</li>
            <li><a href="Gallery.php" style="color: white;"  data-toggle="tooltip" title="Gallery" >Gallery</a></li>
            <li style="cursor: pointer;" onclick="help()"  data-toggle="tooltip" title="Help">Help</li>
           <li><a href="admin-login.php" style="color:white"  data-toggle="tooltip" title="Admin">Admin</a></li>
          </lu>
         
      </div>
      </div>


      <div class="end" style="overflow: hidden; display: inline-block;" >
          <a target="_blank">
          <h4 data-toggle="tooltip" title="Social Media Links">Social Media Links</h4>
          <div class="logo">
            <a href="https://www.facebook.com/jatin.bohra.58"  data-toggle="tooltip" title="Facebook" class="fa fa-facebook"></a>
            <a href="https://twitter.com/jatinbohra6" data-toggle="tooltip" title="twitter" class="fa fa-twitter"></a>
            <a href="https://www.youtube.com/channel/UCYQ7OPJGPxMYrFJ8FjHwYZA?view_as=subscriber" data-toggle="tooltip" title="youtube" class="fa fa-youtube"></a>
            <a href="https://www.instagram.com/bohrajatin1999/?hl=en" data-toggle="tooltip" title="instagram" class="fa fa-instagram"></a>
            <a href="#" data-toggle="tooltip" title="skype" class="fa fa-skype"></a>
          </div>
    </div>

    <div class="end" style="overflow: hidden; display: inline-block;"  >
      <h4 data-toggle="tooltip" title="Map">Map</h4>
      <!--google map location-->
        <section id="section-map" class="clearfix  w3-margin-10px">
            <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
    <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div><script>(function () {
        var setting = {"height":250,"width":792,"zoom":23,"queryString":"Falna, Rajasthan, India","place_id":"ChIJ66qtIzaQQjkRVIm3v2OkjsA","satellite":true,"centerCoord":[25.237233283021308,73.24742639436361],"cid":"0xc08ea463bfb78954","lang":"en","cityUrl":"/india/sanderao-155380","id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"120989"};
        var d = document;
        var s = d.createElement('script');
        s.src = 'https://1map.com/js/script-for-user.js?embed_id=120989';
        s.async = true;
        s.onload = function (e) {
          window.OneMap.initMap(setting)
        };
        var to = d.getElementsByTagName('script')[0];
        to.parentNode.insertBefore(s, to);
      })();</script><a href="https://1map.com/en/map-embed?embed_id=120989">1 Map</a></div>
     
        </section>
      </div>

      <br></br>
      
      
        <a href="#top" class="scrollup"><i class="fa fa-chevron-up"></i></a>
        
        
        <div class="copyright">
        <p> © 2019, The Food Chain | Designed & Managed By:<a href="index.php" data-toggle="tooltip"  style="color: white;" title="THE FOOD CHAIN"> Jatin Bohra</a></p>
        </div>
        
</div>
 <script>
function Func() {
  // welcome message on servise button.
 swal("🙏🏼Hello User🙏",
  "I am jatin bohra  this website admin. welcome to my indian food recipce website. this website give many indian food recipces. I hope you learn and making indian food on your home.'thank you for visit us'.");
 
}
</script>
      

<script type="text/javascript">
  function help(){
    swal("Please Write your problem here:", {
  content: "input",
})
.then((value) => {
  swal(`You typed: ${value}`);
});
  }
</script>


</body>
</html>