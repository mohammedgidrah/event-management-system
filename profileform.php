<form id="profileForm" action="update.php" method="POST">
    <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user['user_id']); ?>">
    <div class="row gx-3 mb-3">
        <div class="col-md-6">
            <label class="small mb-1" for="inputFirstName">First name</label>
            <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="fname" value="<?php echo htmlspecialchars($user['fname']); ?>">
        </div>
        <div class="col-md-6">
            <label class="small mb-1" for="inputLastName">Last name</label>
            <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" name="lname" value="<?php echo htmlspecialchars($user['lname']); ?>">
        </div>
    </div>
    <div class="mb-3">
        <label class="small mb-1" for="inputEmailAddress">Email address</label>
        <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
    </div>
    <div class="mb-3">
        <label class="small mb-1" for="inputPassword">Password</label>
        <input class="form-control" id="inputPassword" type="password" placeholder="Enter your new password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Save changes</button>
</form>
