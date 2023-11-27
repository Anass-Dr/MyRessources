<?php include_once 'db.php' ?>
<?php 
  #- Get users table fields :
  $users = $db->query('SELECT * FROM users');
  $squads = $db->query('SELECT * FROM squads');
  $projects = $db->query('SELECT * FROM projects');
  $ressources = $db->query('SELECT * FROM ressources');
  $projectressources = $db->query('SELECT * FROM projectressources');
  $categories = $db->query('SELECT * FROM categories');
  $subcategories = $db->query('SELECT * FROM subcategories');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="./assets/styles/bootstrap.css" />
    <link rel="stylesheet" href="./assets/styles/main.css" />
    <title>MyRessources</title>
  </head>
  <body>
    <div class="d-flex h-100">
    <aside>
        <div class="brand">
          <img src="./assets/icons/logo.svg" alt="logo" />
        </div>
        <ul class="p-0">
          <li>
            <a href="./"></a>
              <i class="fa-solid fa-user"></i>
              <span>User</span>
          </li>
          <li>
            <a href="./squad.php"></a>
              <i class="fa-solid fa-users"></i>
              <span>Squads</span>
          </li>
          <li>
            <a href="./project.php"></a>
              <i class="fa-solid fa-list-check"></i>
              <span>Projects</span>
          </li>
          <li>
            <a href="./ressource.php"></a>
              <i class="fa-solid fa-paperclip"></i>
              <span>Ressources</span>
          </li>
          <li>
            <a href="./project_ressource.php"></a>
            <i class="fa-solid fa-diagram-project"></i>
            <span>Project Ressources</span>
          </li>
          <li>
            <a href="./category.php"></a>
              <i class="fa-solid fa-layer-group"></i>
              <span>Categories</span>
          </li>
          <li>
              <a href="./sub_category.php"></a>
              <i class="fa-solid fa-sitemap"></i>
              <span>SubCategories</span>
          </li>
          <li class="active">
              <a href="./dashboard.php"></a>
              <i class="fa-solid fa-chart-line"></i>
              <span>Dashboard</span>
          </li>
        </ul>
    </aside>
      <main class="flex-grow-1 d-flex flex-column px-4 py-3">
        <header class="d-flex justify-content-between">
          <h2 class="fs-2">Dashboard</h2>
          <div class="d-flex align-items-center gap-3">
            <i class="fa-solid fa-bell"></i><i class="fa-solid fa-gear"></i>
            <div class="profile_img"></div>
          </div>
        </header>
        <section class="flex-grow-1 mt-4">
            <div class="statics">
              <figure class="statics_card">
                  <i class="fa-solid fa-user"></i>
                  <div class="static_info">
                    <h5>User Table</h5>
                    <p><?php echo $users->num_rows ?></p>
                  </div>
              </figure>
              <figure class="statics_card">
                  <i class="fa-solid fa-users"></i>
                  <div class="static_info">
                    <h5>Squad Table</h5>
                    <p><?php echo $squads->num_rows ?></p>
                  </div>
              </figure>
              <figure class="statics_card">
                  <i class="fa-solid fa-list-check"></i>
                  <div class="static_info">
                    <h5>Project Table</h5>
                    <p><?php echo $projects->num_rows ?></p>
                  </div>
              </figure>
              <figure class="statics_card">
                  <i class="fa-solid fa-paperclip"></i>
                  <div class="static_info">
                    <h5>Ressource Table</h5>
                    <p><?php echo $ressources->num_rows ?></p>
                  </div>
              </figure>
              <figure class="statics_card">
                  <i class="fa-solid fa-paperclip"></i>
                  <div class="static_info">
                    <h5>Project Ressource Table</h5>
                    <p><?php echo $projectressources->num_rows ?></p>
                  </div>
              </figure>
              <figure class="statics_card">
                  <i class="fa-solid fa-layer-group"></i>
                  <div class="static_info">
                    <h5>Category Table</h5>
                    <p><?php echo $categories->num_rows ?></p>
                  </div>
              </figure>
              <figure class="statics_card">
                  <i class="fa-solid fa-layer-group"></i>
                  <div class="static_info">
                    <h5>SubCategory Table</h5>
                    <p><?php echo $subcategories->num_rows ?></p>
                  </div>
              </figure>
            </div>
        </section>
      </main>
    </div>

    <script src="./scripts/bootstrap.js"></script>
    <script src="./scripts/main.js"></script>
  </body>
</html>
<?php mysqli_close($db) ?>