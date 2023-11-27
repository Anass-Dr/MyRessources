<?php include_once 'db.php' ?>
<?php 
  #- Get users table fields :
  $ressourcesTabFlds = $db->query("DESCRIBE ressources");
  $allFields = $ressourcesTabFlds->fetch_all();
  $fieldsNum = count($allFields);

  #- Get all users from db :
  $ressourcesTable = $db->query("SELECT * FROM ressources");
  $ressRows = $ressourcesTable->fetch_all();
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
          <li class="active">
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
          <li>
              <a href="./dashboard.php"></a>
              <i class="fa-solid fa-chart-line"></i>
              <span>Dashboard</span>
          </li>
        </ul>
    </aside>
      <main class="flex-grow-1 d-flex flex-column px-4 py-3">
        <header class="d-flex justify-content-between">
          <h2 class="fs-2">Ressource</h2>
          <div class="d-flex align-items-center gap-3">
            <i class="fa-solid fa-bell"></i><i class="fa-solid fa-gear"></i>
            <div class="profile_img"></div>
          </div>
        </header>
        <span class="row_count"><?php echo count($ressRows) ?> Users Found</span>
        <section class="flex-grow-1 position-relative">
        <ul class="d-flex align-items-center p-0 mt-4 gap-4 filter_ul">
            <li class="active">On going</li>
            <li>Completed</li>
            <li>Pending</li>
            <li>Dispatch</li>
            <li>Concelled</li>
            <li class="ms-auto">
              <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#updateModal'>
                Add Ressource
              </button>
            </li>
        </ul>
          <table class="w-100 mt-4">
            <thead>
              <?php
                foreach ($allFields as $row) {
                  echo "<th>{$row[0]}</th>";
                }
              ?>
              <th>Action</th>
            </thead>
            <tbody>
            <?php for ($i = 0; $i < count($ressRows); $i++) : ?>
                    <tr class="empty_tr<?php if ($i > 4) echo ' hidden' ?>">
                      <td colspan="<?php echo $fieldsNum; ?>" class='td_span'></td>
                    </tr>
                    <tr class="active_tr<?php if ($i > 4) echo ' hidden' ?>">
                      <td><?php echo $ressRows[$i][0] ?></td>
                      <td><?php echo $ressRows[$i][1] ?></td>
                      <td><?php echo $ressRows[$i][2] ?></td>
                      <td>
                        <button type='button' class='btn p-0' data-bs-toggle='modal' data-bs-target='#updateModal' onclick='showUpdateModal(event)'>
                          <i class='fa-solid fa-pen me-2'></i>
                        </button>
                        <button type='button' class='btn p-0' data-bs-toggle='modal' data-bs-target='#deleteModal' onclick='showDeleteModal(event)'>
                          <i class='fa-solid fa-delete-left'></i>
                        </button>
                      </td>                    
                    </tr>
              <?php endfor; ?>
            </tbody>
          </table>

          <!-- Update Modal -->
          <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="updateModalLabel">Update Ressource</h1>
                  <button type="button" class="btn-close modal_btn modal_btn" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="./ressource/update.php" method="POST">
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="sub_name" class="form-label">Ressource Name</label>
                      <input type="text" name="ressource_name" class="form-control" id="sub_name">
                    </div>
                    <div class="mb-3">
                      <label for="subcat_id" class="form-label">Subcategory Id</label>
                      <select name="subcat_id" id="subcat_id" class="form-control">
                        <option value="" selected></option>
                      <?php
                        $subTable = $db->query('SELECT * FROM subcategories');
                        $subRows = $subTable->fetch_all();
                      ?>
                        <?php for ($i = 0; $i < count($subRows); $i++) : ?>
                        <option value="<?php echo $subRows[$i][0]; ?>"><?php echo $subRows[$i][1]; ?></option>
                        <?php endfor; ?>
                      </select>
                    </div>
                    <input type="text" name="query" id="query" value="add">
                    <input type="text" name="id" id="input_id">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal_btn" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Delete Modal -->
          <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="deleteModalLabel">Modal title</h1>
                  <button type="button" class="btn-close modal_btn" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="./ressource/delete.php" method="POST">
                  <div class="modal-body">
                    <p>Do you want to delete this data ?</p>
                  </div>
                  <input type="text" name="id" id="input_id">
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal_btn" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="dltbutton" class="btn btn-primary">Delete</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <?php if (count($ressRows) > 5) : ?>
            <ul
            class="footer position-absolute bottom-0 start-50 d-flex gap-3 p-0"
            onclick="handlePagination(event)"
          >
            <li id="prev"><</li>
            <?php for ($i = 0; $i < count($ressRows) / 5; $i++) : ?>
            <li class="pageNum<?php if($i == 0) echo ' active' ?>"><?php echo $i + 1 ?></li>
            <?php endfor ?>
            <li id="next">></li>
          </ul>
          <?php endif; ?>
        </section>
      </main>
    </div>

    <script src="./scripts/bootstrap.js"></script>
    <script src="./scripts/main.js"></script>
  </body>
</html>
<?php mysqli_close($db) ?>