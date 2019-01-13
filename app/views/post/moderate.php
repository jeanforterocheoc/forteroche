<?php Messages::displayMsg()?>
<div class="container-fluid">
    <h2>Signaler ce commentaire</h2>
    <section>
        
        <p><?= htmlspecialchars($moderateComment->author()) ?></P>    
        <p><?= htmlspecialchars($moderateComment->date()) ?></P>
        <p><?= htmlspecialchars($moderateComment->content()) ?></p>
    </section>
    <div id="resultat"></div>
    <form name= "multiform" id="multiform" action="<?='post/moderateComment/'. htmlspecialchars($moderateComment->id()) ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="comment_report" id="comment_report" value="<?=$moderateComment->report()?>">
        <input type="hidden" name="id"  value="<?=$moderateComment->id()?>">
        <button type="submit" name="btnReport" id="btnReport">Signalez</button>   
        <!-- <input type="submit" id="btnReport" value="Signalez" onclick="reporting();"  > -->
        
    </form>
    <br>
</div>

<script type="text/javascript" src="public/js/report.js"></script> 
    











  

