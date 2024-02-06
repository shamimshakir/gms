<?php include BASEPATH . "/views/header.php" ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb mt-4">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item">Games</li>
        <li class="breadcrumb-item active" aria-current="page">Add new</li>
    </ol>
</nav>

<p class="text-center">
    <?php if(!empty($_SESSION['message'])) {echo $_SESSION['message'];} ?> <br>
</p>


<div class="card">
    <div class="card-header">Add Game</div>
    <div class="card-body">
        <form action="/games" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Game Name</label>
                <select name="name" id="name" required class="form-control">
                    <option value="pool">Pool</option>
                    <option value="carom">Carom</option>
                    <option value="chess">Chess</option>
                    <option value="cards">Cards</option>
                    <option value="uno">Uno</option>
                    <option value="ludo">Ludo</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Board Number</label>
                <input type="number" id="board_number" name="board_number" class="form-control" placeholder="Board Number" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Max Players</label>
                <input type="number" id="max_players" name="max_players" class="form-control" placeholder="Max Players" required>
            </div>
            <button class="btn btn-block btn-success" type="submit">Save</button>
        </form>
    </div>
</div>

<?php include BASEPATH . "/views/footer.php" ?>