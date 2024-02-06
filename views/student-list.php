<?php include BASEPATH . "/views/header.php" ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb mt-4">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Students</li>
    </ol>
</nav>

<p class="text-center">
    <?php if(!empty($_SESSION['message'])) {echo $_SESSION['message'];} ?> <br>
</p>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="m-0">Students</h3>
        <a href="/students/create" role="button" class="btn btn-sm btn-primary">Add new</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </thead>

            <tbody>
            <?php
            foreach($students as $student) {  ?>
                <tr>
                    <td><?php echo $student->id_no; ?></td>
                    <td><?php echo ucfirst($student->name); ?></td>
                    <td><?php echo $student->email; ?></td>
                    <td><?php echo $student->phone; ?></td>
                    <td><?php echo $student->address; ?></td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="/students/edit?id=<?php echo $student->id; ?>">Edit</a>
                        <a class="btn btn-sm btn-danger" href="/students/delete?id=<?php echo $student->id; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>

        </table>
    </div>
</div>

<?php include BASEPATH . "/views/footer.php" ?>