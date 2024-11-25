<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PBL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
        <div class="container">

            <form class="needs-validation" novalidate action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="header">
                    <img src="css/images/logo_Polinema.png" alt="Logo" class="logo" />
                    
                </div>
                <h1 class="h3 mb-3 fw-normal text-center" p style="color: black;">SIBATTA</h1>
                
                <?php if (!empty($message)): ?>
                    <div class="alert alert-danger text-center"><?php echo $message; ?></div>
                    <?php endif; ?>
                    
                    <div class="form-floating">
                        <input name="username" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput">NIM</label>
                        <div class="invalid-feedback">
                            Masukan NIM Yang Terdaftar
                        </div>
                    </div>
                    <div class="form-floating">
                        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                        <div class="invalid-feedback">
                            Masukan Password.
                        </div>
                    </div>
                    
                    <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
                </form>
            </div>
            </main>
</body>

</html>