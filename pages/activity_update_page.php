<form action="" method="post" enctype="multipart/form-data">

    <label>
        Title
    </label>
    <input value="<?php echo $result->getTitle(); ?>" name="txtTitle" type="text" class="form-control" id="actId"
           maxlength="100">
    <label>
        Description
    </label>
    <input value="<?php echo $result->getDescription(); ?>" name="txtDescription" type="text" class="form-control"
           id="actId" maxlength="100">
    <label>
        Place
    </label>
    <input value="<?php echo $result->getPlace(); ?>" name="txtPlace" type="text" class="form-control" id="actId"
           maxlength="100">
    <label>
        End_date
    </label>
    <input value="<?php echo $result->getEndDate(); ?>" name="txtEnd_date" type="text" class="form-control" id="actId"
           maxlength="100">
    <br>
        <label>Doc_photo</label>
            <input type="file" name="activityPhoto" class="form-control" accept="image/png, image/jpeg">
    <br>
    <label>
        Faculty_id
    </label>
    <input value="<?php echo $result->getFacultyId(); ?>" name="txtFaculty_id" type="text" class="form-control"
           id="actId"
           maxlength="13">

    <br>

    <input name="btnSubmit" type="submit" value="Submit" class="btn btn-primary">
</form>

<br>


