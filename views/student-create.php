<?php include BASEPATH . "/views/header.php" ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb mt-4">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item">Students</li>
        <li class="breadcrumb-item active" aria-current="page">Add new</li>
    </ol>
</nav>

<p class="text-center">
    <?php if(!empty($_SESSION['message'])) {echo $_SESSION['message'];} ?> <br>
</p>


<div class="card">
    <div class="card-header">Add Student</div>
    <div class="card-body">
        <form action="/students" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Student Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Student Name" required>
            </div>
            <div class="mb-3">
                <label for="id_no" class="form-label">Student ID</label>
                <input type="text" id="id_no" name="id_no" class="form-control" placeholder="Student ID" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone" required>
            </div>
            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="blood_group" class="form-label">Blood Group</label>
                <input type="text" id="blood_group" name="blood_group" class="form-control" placeholder="Blood Group" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" id="address" name="address" class="form-control" placeholder="Address" required>
            </div>
            <button class="btn btn-block btn-success" type="submit">Save</button>
        </form>
    </div>
</div>

<?php include BASEPATH . "/views/footer.php" ?>