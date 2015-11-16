<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.2/js/materialize.min.js"></script>
<script src="../controller/controllerDao.js"></script>
<script src="../js/scripts.js"></script>
<script src="../model/model.js"></script>

<script>
  $( document ).ready(function(){
    $(".button-collapse").sideNav();
    $('select').material_select();
  });

 $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
</script>

</body>
</html>