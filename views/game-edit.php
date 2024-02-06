<?php include BASEPATH . "/views/header.php" ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Games</li>
            <li class="breadcrumb-item active" aria-current="page">Update</li>
        </ol>
    </nav>

    <center>
        <?php if(!empty($_SESSION['message'])) {echo $_SESSION['message'];} ?> <br>
    </center>

    <div class="card">
        <div class="card-header">Add Game</div>
        <div class="card-body">
            <form action="/games/update" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Game Name</label>
                    <select name="name" id="name" required class="form-control">

                        <?php foreach (['pool', 'carom', 'chess', 'cards', 'uno', 'ludo'] as $g) {
                            $selected = $g == $game->name ? "selected" : "";
                            echo "<option value='${g}' $selected>" . ucfirst($g) . "</option>\n";
                        } ?>
                    </select>
                    <input type="hidden" name="id" value="<?php echo $game->id; ?>">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Board Number</label>
                    <input type="number" id="board_number" name="board_number" class="form-control" placeholder="Board Number" required value="<?php echo $game->board_number; ?>">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Max Players</label>
                    <input type="number" id="max_players" name="max_players" class="form-control" placeholder="Max Players" required value="<?php echo $game->max_players; ?>">
                </div>
                <button class="btn btn-block btn-success" type="submit">Update Game</button>
            </form>
        </div>
    </div>

<?php include BASEPATH . "/views/footer.php" ?>