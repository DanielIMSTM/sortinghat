<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css" type="text/css">
    <title>Create Account</title>
</head>
<body>
    <div class="container">
        <div class="title">Create account</div>
        <div class="content">
          <form method="GET" action="add.php">
            <div class="user-details">
              <div class="input-box">
                <span class="details">First Name</span>
                <input type="text" placeholder="Enter your first name" name="firstname" required>
              </div>
              <div class="input-box">
                <span class="details">Name</span>
                <input type="text" placeholder="Enter your name" name="name" required>
              </div>
              <div class="input-box">
                <span class="details">Email</span>
                <input type="email" placeholder="Enter your email" name="email" required>
              </div>
              <div class="input-box">
                <span class="details">Age</span>
                <input type="date" id="date-input" name="age" required>
              </div>
              <div class="input-box">
                <span class="details">Description</span>
                <input type="text" placeholder="Tell me something about yourself" name="description" required>
              </div>
            </div>
            <div class="gender-details">
              <input type="radio" name="gender" id="dot-1" value="Male">
              <input type="radio" name="gender" id="dot-2" value="Female">
              <input type="radio" name="gender" id="dot-3" value="x">
              <span class="gender-title">Gender</span>
              <div class="category">
                <label for="dot-1">
                <span class="dot one"></span>
                <span class="gender">Male</span>
              </label>
              <label for="dot-2">
                <span class="dot two"></span>
                <span class="gender">Female</span>
              </label>
              <label for="dot-3">
                <span class="dot three"></span>
                <span class="gender">X</span>
                </label>
              </div>
            </div>
            <div class="button" id="addProfile">
              <input type="submit" value="Create account">
            </div>
          </form>
        </div>
      </div>

      <script src="assets/register.js">

      </script>
</body>
</html>