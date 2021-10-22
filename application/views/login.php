<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/fontawesome/css/all.css">

</head>

<body>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="col-md-4 p-4 border border-primary border-2 rounded-3">
            <h4 class="text-center mb-3">Login</h4>
            <form action="<?= base_url('login_page'); ?>" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input autofocus type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?= set_value('email'); ?>">

                    <div class="form-text text-danger"><?= form_error('email'); ?></div>
                </div>
                <div class="mb-3">
                    <label for="level" class="form-label">Login Level</label>
                    <select name="level" id="level" class="form-control">
                        <option value="">-- Pilih Level --</option>
                        <option value="1" <?= set_select('level', '1'); ?>>Guru</option>
                        <option value="2" <?= set_select('level', '2'); ?>>Administrator</option>
                    </select>
                    <div class="form-text text-danger"><?= form_error('level'); ?></div>

                </div>
                <!-- <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">


                </div> -->
                <label for="password" class="form-label">Password</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" id="password" name="password">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="far fa-eye"></i> </button>
                </div>
                <div class="form-text text-danger"><?= form_error('password'); ?></div>

                <!-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Show Password</label>
                </div> -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>



    <div class="position-fixed top-50 start-50 translate-middle" style="z-index: 11">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="..." class="rounded me-2" alt="...">
                <strong class="me-auto">Bootstrap</strong>
                <small>11 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div>
        </div>
    </div>


    <script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>

    <script>
        var toastLiveExample = document.getElementById('liveToast')
        var toast = new bootstrap.Toast(toastLiveExample)

        toast.show()
    </script>


</body>

</html>