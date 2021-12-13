<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <h3><img src="assets/img/atom_003.svg" height=50 width=50>Atom
                <form action="?controller=index&action=signUp" method="post">
                    <button class="btn" id="SignUp">Sign up</button>
                </form>
            </h3>
        </div>
        <div class="row">
            <table>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><a href="?controller=index&action=show&id=<?= $user['id'] ?>"><?= $user['id'] ?></a></td>
                        <td><img src='<?= $user['path_to_img'] ?>' height=50 width=50 /></td>
                        <td><?= $user['first_name'] ?></td>
                        <td><?= $user['last_name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <?php foreach ($roles as $role) : ?>
                            <?php if ($role['id'] == $user['role_id']) : ?>
                                <td><?= $role['title'] ?></td>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <td><a href="?controller=users&action=delete&id=<?= $user['id'] ?>">X</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="row">
            <form action="?controller=index&action=signUp" method="post">
                <button class="btn" id="SignUp" action="controller=index&action=signUp">Add User</button>
            </form>
        </div>
    </div>
</body>

</html>