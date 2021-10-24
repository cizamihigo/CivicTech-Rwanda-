<?php
include("includes/head.php");
?>

<i class="fa fa-star fa-2x " style="color: gray"></i>
<i class="fa fa-star fa-2x " style="color: gray"></i>
<i class="fa fa-star fa-2x " style="color: gray"></i>
<i class="fa fa-star fa-2x " style="color: gray"></i>
<i class="fa fa-star fa-2x " style="color: gray"></i>

<script src="js/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.fa-star').mouseover(function(){
            console.log("here");
        });

        $('.fa-star').mouseleave(function(){
            console.log("here2");
        });
    });
</script>