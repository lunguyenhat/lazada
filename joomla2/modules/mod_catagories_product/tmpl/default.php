<?php 
// No direct access
defined('_JEXEC') or die; 


$document = JFactory::getDocument();
$document->addScriptDeclaration('
   $( function() {
    $( "#tabs" ).tabs();
  } );
');
?>
<div id="tabs">
  <ul>
    <?php foreach ($cat as $l => $cats): ?>
      <li><a href="#tabs-<?php echo $l + 1 ?>"><?= $cats['title'] ?></a></li>  
    <?php endforeach ?>

  </ul>
  <?php foreach ($cat as $key => $value): ?>
    <?php  $content = ModCatagoriesProductHelper::getContentByIdcat($value['id']); ?>
      <div id="tabs-<?php echo $key + 1 ?>">
        <?php foreach ($content as $value): ?>
          <?php $image = json_decode($value['images']); ?>
          <div class="card-group col-sm-4">
                <div class="card">
                  <img class="card-img-top" src="<?= $image->image_intro; ?>" alt="Card image cap">
                  <div class="card-block">
                    <p class="card-text"><?= $value['title'] ?></p>
                  </div>
                </div>
              </div>
        <?php endforeach ?>
      </div>
  <?php endforeach ?>
</div>