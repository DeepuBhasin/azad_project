<?php
if ($feedback = $this->session->flashdata('message')) :
    $color_message = $this->session->flashdata('color');
?>
    <div class="alert alert-<?= $color_message ?>">
        <?= $feedback; ?>
    </div>
<?php
endif;
?>