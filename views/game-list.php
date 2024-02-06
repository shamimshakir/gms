<?php include BASEPATH . "/views/header.php" ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb mt-4">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Games</li>
    </ol>
</nav>

<p class="text-center">
    <?php if(!empty($_SESSION['message'])) {echo $_SESSION['message'];} ?> <br>
</p>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="m-0">Games</h3>
        <a href="/games/create" role="button" class="btn btn-sm btn-primary">Add new</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <th>Name</th>
                <th>Board Number</th>
                <th>Max Players</th>
                <th>Actions</th>
            </thead>

            <tbody>
            <?php
            foreach($games as $game) {  ?>
                <tr>
                    <td><?php echo ucfirst($game->name); ?></td>
                    <td><?php echo $game->board_number; ?></td>
                    <td><?php echo $game->max_players; ?></td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="/games/edit?id=<?php echo $game->id; ?>">Edit</a>
                        <a class="btn btn-sm btn-danger" href="/games/delete?id=<?php echo $game->id; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>

        </table>
    </div>
</div>

<?php include BASEPATH . "/views/footer.php" ?>