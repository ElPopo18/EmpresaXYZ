
<?php
if(isset($_REQUEST['n'])){ ?>
<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
  <strong>La reunion fue registrado correctamente.</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>

<?php
if(isset($_REQUEST['na'])){ ?>
<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
  <strong>La reunion fue actualizado correctamente.</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>

<div class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="display: none;">
  <strong>La reunion fue borrado correctamente.</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

