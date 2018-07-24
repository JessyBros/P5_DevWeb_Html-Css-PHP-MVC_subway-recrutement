<!--<script>
var lat = "";
var lng = "";
var title = "";
</script>-->


<?php while ($marqueurs = $donneesMarqueurs->fetch()) {?>

<!--<script>
lat = <?php htmlspecialchars($marqueurs['lat']) ?>;
lng = <?php htmlspecialchars($marqueurs['lng']) ?>;
title = <?php htmlspecialchars($marqueurs['ville']) ?>;

</script>-->
   <script>PrototypeMarqueur();</script>
<?php }  $donneesMarqueurs->closeCursor(); ?> 