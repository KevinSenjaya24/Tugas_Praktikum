<form action="" method="post">
    <div class="form-group">
        <label for="facId">ID</label>
        <input value="<?php echo $faculty->getId(); ?>" type="text" class ="form-control" id="facId" name="txtId">
        <label for="facName">Faculty Name</label>
        <input value="<?php echo $faculty->getName(); ?>" type="text" class ="form-control" id="facName" name="txtName">
    </div>
    <input name="btnSubmit" type="submit" class="btn btn-primary">
</form>

<br/>


