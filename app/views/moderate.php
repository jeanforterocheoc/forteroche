<h1>Signaler ce commentaire</h1>
<section>
    
    <p><?= htmlspecialchars($moderateComment->author()) ?></P>    
    <p><?= htmlspecialchars($moderateComment->date()) ?></P>
    <p><?= htmlspecialchars($moderateComment->content()) ?></p>
</section>
   
<form action="<?='post/moderateComment/'. htmlspecialchars($moderateComment->id()) ?>" method="post">
    <input type="hidden" name="comment_report" value="<?=$moderateComment->report()?>">
    <button type="submit" name="report" id="report">Signalez</button>
    
</form>




  

