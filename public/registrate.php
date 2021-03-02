<?php include "../tpl/header.php"; ?>
<?php include "../tpl/nav.php";?>

<div class="registerForm">
  <form>
    <div class="row">
      <div class="mx-auto form_group col-5">

        <div class="form-group row">
          <label class="col-4" for="registerName">Անուն</label>
          <input name="registerName" required type="text" class="form-control col-8" id="registerName" placeholder="Գրեք Ձեր անուն">
        </div>
        <div class="form-group row">
          <label class="col-4" for="registerAge">Տարիքայաին խումբ</label>
          <select name="registerAge" required class="form-control col-8" id="registerAge">
            <option value="hidden" selected hidden disabled>Ընտրեք տարիքայաին խումբը</option>
            <?php $db = new MysqlDB();
            $query = $db->getAge();
            while ($result = mysqli_fetch_assoc($query)) { ?>
              <option value="<?= $result['id'] ?>"><?= $result['age'] ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group row">
          <label class="col-4" for="registerNumber">Հեռախոսահամար</label>
          <input type="number" required class="form-control col-8" id="registerNumber" placeholder="Գրեք հեռախոսահամարը">
        </div>
        <div class="form-group row">
          <label class="col-4" for="registerHairdress">Վարսավիր</label>
          <select name="registerHairdress" required class="form-control col-8" id="registerHairdress">
            <!-- <option value="hidden" selected hidden disabled>Ընտրեք վարսավիրին </option> -->
            <?php $db = new MysqlDB();
            $query = $db->getHairdress();
            while ($result = mysqli_fetch_assoc($query)) { ?>
              <option value="<?= $result['id'] ?>"><?= $result['hairdress'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group row">
        <label class="col-4" for="registerDateDay">Օրը</label>

        <div id="registerDateDay"></div>
        </div>
        <div class="form-group row">
          <label class="col-4" for="registerDate">Ժամը</label>
         
          <select name="registerDate" required class="form-control col-4" id="registerDate">
            <option value="hidden" selected hidden disabled>Ընտրեք ժամը</option>
            <?php $db = new MysqlDB();
            $query = $db->getDate();
            while ($result = mysqli_fetch_assoc($query)) { ?>
              <option disabled value="<?= $result['id'] ?>"><?= $result['date'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group row">
          <label class="col-4" for="registerHairCut">Կտրվածք</label>
          <select name="registerHairCut" required title="Ընտրեք կտրվածքը" multiple class="selectpicker form-control  col-8" id="registerHairCut">
            <?php $db = new MysqlDB();
            $query = $db->getHairCuts();
            while ($result = mysqli_fetch_assoc($query)) { ?>
              <option disabled value="<?= $result['price'] ?>"><?= $result['name'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group row">
          <div class="col-4">Գինը կազմում է</div>

          <div id="registerPrice" class="col-8">0</div>
        </div>

        <input name="registerSubmit" id="registerSubmit" type="button" class="btn btn-primary float-right" value="Գրանցվել">

        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                grancumy avartvac e
                <div id="dataModal"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<?php include "../tpl/footer.php"; ?>