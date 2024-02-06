<?php include BASEPATH . "/views/header.php" ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb mt-4">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Bookings</li>
    </ol>
</nav>

<p class="text-center">
    <?php if(!empty($_SESSION['message'])) {echo $_SESSION['message'];} ?> <br>
</p>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="m-0">Bookings</h3>
        <a role="button" class="btn btn-sm btn-primary">Add new</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <th>ID</th>
                <th>Game</th>
                <th>Student</th>
                <th>Ended at</th>
                <th>Actions</th>
            </thead>

            <tbody>
            <?php
            foreach($bookings as $booking) {  ?>
                <tr>
                    <td><?php echo $booking->id; ?></td>
                    <td><?php echo $booking->game_name; ?></td>
                    <td><?php echo $booking->student_name; ?></td>
                    <td><?php echo $booking->ended_at; ?></td>
                    <td>
                        <a class="btn btn-sm btn-warning">Edit</a>
                        <a class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>

        </table>
    </div>
</div>

<?php include BASEPATH . "/views/footer.php" ?>