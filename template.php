<div class="list_spaces">
    
    <?php foreach ($spaces as $space): ?>
    
        
        <div class="list_spaces_item">
        
            <a href='<?php echo $space->singleUrl; ?>'>
                <?php echo $space->name; ?>
            </a>
        
        </div>
        
    
    
    <?php endforeach; ?>
    
</div>
