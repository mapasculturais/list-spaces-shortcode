<div class="list_spaces">
    
    <?php foreach ($spaces as $space): ?>
    
        
        <div class="list_spaces_item">
        
            
            
            <!--
            <small>
                <?php echo $space->type->name; ?>
            </small>
            -->
            <p class="space-description">
                <?php $this->maybePrintAvatar($space); ?>
                
                <a class="space-title" href='<?php echo $space->singleUrl; ?>'>
                    <?php echo $space->name; ?>
                </a>
            
                <?php echo $space->shortDescription; ?>
                
                <a class="vermas" href='<?php echo $space->singleUrl; ?>'>
                        Ver más
                </a>
            </p>
            
            <p class="meta">
                <b>Dirección:</b> <?php echo $space->endereco; ?>
            </p>
        
        </div>
        
    
    
    <?php endforeach; ?>
    
</div>
