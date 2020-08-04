<br/>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Tambah Data</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Form Faculty</h4>
            </div>
            <div class="modal-body">
        <form action="" method="post">
            <div class="form-group">
                <label for="facId">ID</label>
                <input type="text" class ="form-control" id="facId" name="txtId" placeholder="Silahkan masukan ID">
                <label for="facName">Faculty Name</label>
                <input type="text" class ="form-control" id="facName" name="txtName" placeholder="Silahkan masukan Faculty Name">
            </div>
            <input name="btnSubmit" type="submit" class="btn btn-primary">
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
        <th>Faculty ID</th>
        <th>Faculty Name</th>
        <th>Establish</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>

    <?php
    foreach ($result as $faculty) {
        echo '<tr>';
        echo '<td>' . $faculty->getID() . '</td>';
        echo '<td>' . $faculty->getName() . '</td>';
        echo '<td>' . $faculty->getEstablish() . '</td>';
        echo '<td><button class="btn btn-primary" onclick="updateValue(\' ' . $faculty->getId() . '\')">Update</button>
                  <button class="btn btn-primary" onclick="deleteValue(\' ' . $faculty->getId() . '\')">Delete</button></td>';
        echo '</tr>';
    }
    $link = null;
    ?>
    </tbody>
</table>

