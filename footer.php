<nav class="navbar fixed-bottom navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">EPS Péruwelz</a>
  </div>
</nav>

<!-- Bootstrap JavaScript Libraries et Jquery -->
<script src="/js/jquery-3.6.0.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>



<script>
  $(document).ready(function(){
        $("#fr").click(function(){
          //alert($(this).val());
          document.cookie="langue" + "=" +$(this).val()+ "; " + 30*24*60*60 ;
        });

        $("#en").click(function(){
          //alert($(this).val());
          document.cookie="langue" + "=" +$(this).val() + "; "+ 30*24*60*60 ;
        });

        $("#it").click(function(){
          //alert($(this).val());
          document.cookie="langue" + "=" + $(this).val()+ "; " + 30*24*60*60 ;
        });

    });
</script>