<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta meta name="viewport" content="width=device-width, user-scalable=no" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url(); ?>css/style.css">

    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/423bfd438c.js" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <title>Register</title>
</head>

<body class="bg-darker" style="background: url(<?= base_url(); ?>image/back.png); background-size: cover;">
    <aside class="col-sm-12 bg-darker text-light" style="height: 99vh; display: flex; justify-content: center; align-items: center; margin-right: 100px;">
        <div class="card bg-dark">
            <article class="card-body">
                <h4 class="card-title mb-4 mt-1">Sign Up</h4>
                <form action="<?= base_url() ?>register/tambahUser" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" class="form-control" placeholder="Username" type="text">
                    </div> <!-- form-group// -->

                    <div class="form-group">
                        <label>Your password</label>
                        <input name="password" class="form-control" placeholder="Password" type="password">
                    </div> <!-- form-group// -->

                    <br>

                    <div class="form-group ">
                        <button type="submit" class="font-weight-light btn btn-primary btn-lg"> Request Sign Up </button>
                    </div> <!-- form-group// -->

                    <a href="<?= base_url(); ?>login/index" class="font-weight-light btn btn-secondary btn-lg">Back to Login</a>

                    <?php if ($this->session->flashdata('register')) { ?>
                        <div class="alert alert-danger fade show" role="alert">
                            <?= $this->session->flashdata('register') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </div>
                    <?php } ?>

                    <?php if (validation_errors()) { ?>
                        <div class=" form-group alert alert-danger alert-dismissible mt-2" role="alert">
                            <strong> <?= validation_errors(); ?> <strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                        </div>
                    <?php } ?>
                </form>
            </article>
        </div>
    </aside>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>