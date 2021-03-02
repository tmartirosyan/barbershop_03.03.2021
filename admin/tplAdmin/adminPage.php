<?php $userInfo = $_SESSION['user_info']; ?>
<header>
  <div class="setDateDayChangesDiv">
    <div id="setDateDayChanges"></div>
    <!-- <button class="btn btn-primary " id="setDateDayChangesButton"> hastatel</button> -->
  </div>

  <a class="btn btn-primary" href="index.php?ac=logout">Logout</a>
  <div class="headerText">
    <!-- <h1>Bari galust <?php echo $userInfo['hairdress'] ?></h1> -->
  </div>
</header>
<div class="site">

  <article>
    <div class="row">
      <table class="table table-bordered table-hover table-striped dataTable no-footer" cellspacing="0" id="exampleAddRow" role="grid" aria-describedby="exampleAddRow_info">
        <thead>
          <tr role="row">
            <th>id</th>
            <th>anun</th>
            <th class="d-none d-sm-table-cell">tariq</th>
            <th class="d-none d-md-table-cell">heraxos</th>
            <th>jamy</th>
            <th class="d-none d-xl-table-cell">ory</th>
            <th class="d-none d-lg-table-cell">carayutyun</th>
            <th class="d-none d-lg-table-cell" >giny</th>
            <th>hastatvac</th>
            <th>
              <div id="removeAllOrders" class="btn btn-danger ">bolory</div>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php
          $db = new MysqlDB();
          $pageId = (isset($_GET['page'])) ? $_GET['page'] : 1;
          $limit = ($pageId - 1) * 10;
          $query = $db->getOrdersByLimit($limit);
          $count = mysqli_fetch_assoc($db->getOrdersCount());
          $count = $count['count'];
          $countLi = ceil($count / 10);
          $tableId = 0;
          while ($result = mysqli_fetch_assoc($query)) {
            $tableId++;
            $id = $result['id'];
            $name = $result['name'];
            $age = mysqli_fetch_assoc($db->getAgeById($result['age']))['age'];
            $number = $result['number'];
            $date = mysqli_fetch_assoc($db->getDateById($result['date']))['date'];
            $day = $result['dateDay'];
            $hairCut = $result['hairCut'];
            $price = $result['price'];
            $checked = $result['checked'];
          ?>
            <tr class="orders" data-toggle="collapse" href="#collapseExample<?= $id; ?>" index=<?= $tableId ?> data-index=<?= $id; ?> role="row">
              <td class="tableId"><?= $tableId; ?></td>
              <td class="name"><?= $name; ?></td>
              <td class="age d-none d-sm-table-cell"><?= $age; ?></td>
              <td class="number d-none d-md-table-cell"><?= $number; ?></td>
              <td class="date"><?= $date; ?></td>
              <td class="day d-none d-xl-table-cell"><?= $day; ?></td>
              <td class="hairCut d-none d-lg-table-cell"><?= $hairCut; ?></td>
              <td class="price d-none d-lg-table-cell"><?= $price; ?></td>
              <td><?php if ($checked) { ?>
                  <button class=" btn btn-success"> hastatvac</button>
              </td>
            <?php } else { ?>
              <button class=" btn btn-primary confirmOrder"> hastatel</button></td>

            <?php } ?>
            </td>
            <td><button class="btn btn-danger deleteOrder"> jnjel</button></td>

            </tr>
            <tr class="collapse" id="collapseExample<?= $id; ?>">
            <td colspan="100%">
            <ul>
              <li class="row name"><div class="col-3">name</div><div class="col-9"><?= $name; ?></div></li>
              <li class="row date"><div class="col-3">date</div><div class="col-9"><?= $date; ?></div></li>
              <li class="row day"><div class="col-3">day</div><div class="col-9"><?= $day; ?></div></li>
              <li class="row age"><div class="col-3">age</div><div class="col-9"><?= $age; ?></div></li>
              <li class="row number"><div class="col-3">number</div><div class="col-9"><?= $number; ?></div></li>
              <li class="row hairCut"><div class="col-3">hairCut</div><div class="col-9"><?= $hairCut; ?></div></li>
              <li class="row price"><div class="col-3">price</div><div class="col-9"><?= $price; ?></div></li>
            </ul>
            </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>


    <div class="row">
      <div class="row col-12">
        <div class="dataTables_info col-12 text-center"  >Showing <?= $count ?> entries</div>
      </div>
      <div class="row col-12">
        <div class=" m-auto" id="exampleAddRow_paginate">
          <ul class="pagination">
            <li class=" page-item previous <?php if ($pageId <= 1) echo "disabled"; ?>  " id="exampleAddRow_previous"><a href="?page=<?= $pageId - 1; ?>" class="page-link">Previous</a></li>
            <?php
            for ($i = 1; $i <= $countLi; $i++) { ?>
              <li class=" page-item <?php if ($pageId == $i) echo "active"; ?>"><a href="?page=<?= $i; ?>" class="page-link"><?= $i; ?></a></li>
            <?php } ?>
            <li class=" page-item next  <?php if ($pageId == $countLi) echo "disabled"; ?>" id="exampleAddRow_next"><a href="?page=<?= $pageId + 1; ?>" class="page-link">Next</a></li>
          </ul>
        </div>
      </div>
    </div>
  </article>
</div>

<footer>
  <p>Footer</p>
</footer>