<form method="post" action="<?php echo base_url()."index.php/gambar/status" ?>">
<input type="hidden" name="id" readonly value="<?php echo $id; ?>">
    <button><?php echo $status; ?> </button>
    <input type="submit" name="tolak" value="Tolak">
</form>