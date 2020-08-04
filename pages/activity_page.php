<br/>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Tambah Data</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Form Activity</h4>
            </div>
            <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                <label>
                    Title
                </label>
                <input name="txtTitle" type="text" class="form-control" id="actId" maxlength="100" placeholder="Please Insert Title">
                <label>
                    Description
                </label>
                <input name="txtDescription" type="text" class="form-control" id="actId" maxlength="100" placeholder="Please Isert Description">
                <label>
                    Place
                </label>
                <input name="txtPlace" type="text" class="form-control" id="actId" maxlength="100" placeholder="Please Insert Place">
                <label>
                    End date
                </label>
                <input name="txtEnd_date" type="text" class="form-control" id="actId" maxlength="100" placeholder="Please Insert End date">

                <label>Doc_photo</label>
                <input type="file" name="activityPhoto" class="form-control" accept="image/png, image/jpeg">

                <label>
                    Faculty Id
                </label>
                <input name="txtFaculty_id" type="text" class="form-control" id="actId" maxlength="13" placeholder="Faculty id">

                <br>
                <input name="btnSubmit" type="submit" value="Submit" class="btn btn-primary">
                </div>
            </form>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<br>
<br>

<table class="display" id="myTable" border="1">
    <thead>
    <tr>
        <th>id</th>
        <th>title</th>
        <th>description</th>
        <th>place</th>
        <th>start_date</th>
        <th>end_date</th>
        <th>doc_photo</th>
        <th>faculty_id</th>
        <th>action</th>
    </tr>
    </thead>
    <tbody>

    <?php
    foreach ($result as $row) {
        echo '<tr>';
        echo '<td>' . $row->getId() . '</td>';
        echo '<td>' . $row->getTitle() . '</td>';
        echo '<td>' . $row->getDescription() . '</td>';
        echo '<td>' . $row->getPlace() . '</td>';
        echo '<td>' . $row->getStartDate() . '</td>';
        echo '<td>' . $row->getEndDate() . '</td>';
        echo '<td>';
        if ($row->getDocPhoto()!=null) {
            echo '<img class="img-tbl" src="uploads/' . $row->getDocPhoto() . '">';
        }
        echo '<td>' . $row->getName() . '</td>';
        echo '<td><button class="btn btn-primary" onclick="updateValue2(\'' . $row->getId() . '\')">Update</button>
                  <button class="btn btn-primary" onclick="deleteValue2(\'' . $row->getId() . '\')">Delete</button></td>';
        echo '</tr>';
    }
    $link = null;

    ?>
    </tbody>
</table>

