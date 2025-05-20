  <header class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="index.php">Не мой сам</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">

          <?php
          
          if (isset($_SESSION["auth"])) {
            if ($_SESSION["login"] === "adminka") {
              echo '
                <a class="nav-link" href="admin.php">Панель администратора</a>
                ';
            } else {
              echo '
                <a class="nav-link" href="cr_zay.php">Заявки</a>
                ';
            }
          } else {
            echo '
            <a class="nav-link" href="index.php">Регистрация</a>
            ';
          }

          ?>

        </li>
        <li class="nav-item">
          <?php
          
          if (isset($_SESSION["auth"])) {
            echo '
            <a class="nav-link" href="php/logout.php">Выход</a>
            ';
          } else {
            echo '
            <a class="nav-link" href="auth.php">Вход</a>
            ';
          }

          ?>
        </li>
      </ul>
    </div>
  </div>
</nav>
  </header>