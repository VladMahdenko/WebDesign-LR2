<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .container {
            width: 400px;
        }

        h3 {
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <h3><img src="assets\img\atom_003.svg" height=50 width=50>Atom</h3>
    <div class="container">
        <form action="?controller=users&action=add" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="field">
                    <label>First name: <input type="text" name="first_name"></label>
                </div>
            </div>
            <div class="row">
                <div class="field">
                    <label>Last name: <input type="text" name="last_name"></label>
                </div>
            </div>
            <div class="row">
                <div class="field">
                    <label>E-mail: <input type="email" name="email"><br></label>
                </div>
            </div>
            <div class="row">
                <div class="field">
                    <label>Role:
                    </label>
                    <select name="role" id="role" class="select">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="field">
                    <label>Password <input type="password" name="password"></label>
                </div>
            </div>
            <div class="row">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Photo</span>
                        <input type="file" name="photo" accept="image/png, image/gif, image/jpeg">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
            <input type="submit" class="btn" value="Sign Up">
        </form>
    </div>
</body>

</html>