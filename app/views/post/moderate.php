<?php Messages::displayMsg()?>
<div class="container-fluid">
    <h2>Signaler ce commentaire</h2>
    <section>
        
        <p><?= htmlspecialchars($moderateComment->author()) ?></P>    
        <p><?= htmlspecialchars($moderateComment->date()) ?></P>
        <p><?= htmlspecialchars($moderateComment->content()) ?></p>
    </section>
    
    <form action="<?='post/moderateComment/'. htmlspecialchars($moderateComment->id()) ?>" method="post">
        <input type="hidden" name="comment_report" value="<?=$moderateComment->report()?>">
        <button type="submit" name="report" id="report">Signalez</button>   
    </form>
    <br>
    <!-- <?php if(isset($reportingMsg)):?>
            <strong><?= $reportingMsg;?></strong>
    <?php endif; ?>  -->
</div>






  

