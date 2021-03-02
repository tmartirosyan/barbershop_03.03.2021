$(document).ready(function () {
  // set  today data in datepicker on page registrate
  $.ajax({
    type: "POST",
    url: "../tpl/requests.php",
    data: { getDateDays: true },
    success: function (suc) {
      if (suc) {
        var assoc = JSON.parse(suc)
        var days = assocToArr(assoc, "days")
        datePickerDisabileData(days);
      }
    }
  });
  //if change age call this on page registrate
  $("#registerAge").on("change", function () {
    let registerAgeValue = $(this).val();
    let registerHairCut = $("#registerHairCut option");
    if (registerAgeValue == 1)
      getHairCutsByAge(1);
    else {
      getHairCutsByAge(0);
    }
    $(registerAge).removeClass("lightcoralText");

  })
  //if change haircut call this on page registrate
  $("#registerHairCut").on("change", function () {
    changePrice();
    $(registerHairCut).parent().find(".filter-option-inner-inner").removeClass("lightcoralText");

  });
  //if change register hour call this on page registrate
  $("#registerDate").on("change", function () {
    $(registerDate).removeClass("lightcoralText");
  });  //if change day  call this on page registrate

  //if cliced hairdress add red color Hairdress
  $("#registerDate").on("click", function () {
    let check = $("#registerHairdress option:selected").val();
    if (check == "hidden") {
      $(registerHairdress).addClass("lightcoralText");

    }

  });
  //if change hairdress call this on page registrate
  $("#registerHairdress").on("change", function () {

    let registerHairdressValue = $(this).val();
    let registerDateDayValue = $("#registerDateDay").data('datepicker').getFormattedDate('dd-mm-yyyy')
    let registerDate = $("#registerDate option");
    getDateByHairdress(registerHairdressValue, registerDateDayValue);
    $(registerHairdress).removeClass("lightcoralText");
  });
  //on click submit call this on page registrate
  $("#registerSubmit").on("click", function () {
    let data = getAllDataValue();
    if (data) {
      var jsonString = JSON.stringify(data);
      $.ajax({
        type: "POST",
        url: "../tpl/requests.php",
        data: { addOrder: jsonString },
        success: function (suc) {
          if (suc) {
            let dataModal = getAllDataText();
            var modal = $("#dataModal");
            $('#modal').modal('toggle');
            setModalData(modal, dataModal);
            sendMail(dataModal);
          }
        }
      });
    }
  })
  // if closed modal window call this on page registrate
  $('#modal').on('hidden.bs.modal', function () {
    deleteAllData();
  })
  // this function sets modal data to modal
  function setModalData(modal, dataModal) {

    $(modal).html("anuny" + dataModal["name"] + "</br>" +
      "Tariqajin xumb" + dataModal["age"] + "</br>" +
      "heraxosahamar" + dataModal["number"] + "</br>" +
      "ory" + dataModal['dateDay'] + "</br>" +
      "jamy" + dataModal['date'] + "</br>" +
      "varsavir" + dataModal['hairdress'] + "</br>" +
      "trvacq" + dataModal['hairCut'] + "</br>" +
      "giny" + dataModal['price']);

  }
  // this function returned all input texts

  function registerDateDayChange() {
    let registerHairdressValue = $("#registerHairdress option:selected").val();
    let registerDateDayValue = $("#registerDateDay").data('datepicker').getFormattedDate('dd-mm-yyyy')
    let registerDate = $("#registerDate option");
    if (registerHairdressValue != "hidden") {
      getDateByHairdress(registerHairdressValue, registerDateDayValue);
      $(registerHairdress).removeClass("lightcoralText");
    }
  }
  function getAllDataText() {
    let allData = {},
      selected = $("#registerHairCut option:selected"),
      hairCutArr = [],
      hairCut;
    for (let i = 0; i < selected.length; i++) {
      let val = $(selected[i]).text();
      hairCutArr.push(val);
    }
    hairCut = hairCutArr.toString()
    allData["name"] = $("#registerName").val();
    allData["age"] = $("#registerAge").find("option:selected").text()
    allData["number"] = $("#registerNumber").val();
    allData["date"] = $("#registerDate").find("option:selected").text();
    allData["dateDay"] = $("#registerDateDay").data('datepicker').getFormattedDate('dd-mm-yyyy')
    allData["hairdress"] = $("#registerHairdress").find("option:selected").text();
    allData["hairCut"] = hairCut;
    allData["price"] = getPrice();
    return allData;
  }
  // if all inputs selected this function returned all input values,or changed color red

  function getAllDataValue() {
    let selected = $("#registerHairCut option:selected"),
      hairCutArr = [],
      hairCut,
      registerName = $("#registerName"),
      registerAge = $("#registerAge"),
      registerNumber = $("#registerNumber"),
      registerDate = $("#registerDate"),
      registerDateDay = $("#registerDateDay").data('datepicker').getFormattedDate('dd-mm-yyyy'),
      registerHairdress = $("#registerHairdress"),
      registerHairCut = $("#registerHairCut"),
      check = true;
    if (!registerName.val()) {
      $(registerName).addClass("lightcoralPlaceholder");
      check = false;
    }
    if (!registerAge.val() || registerAge.val() == "hidden") {
      $(registerAge).addClass("lightcoralText");
      check = false;
    }
    if (!registerNumber.val()) {
      $(registerNumber).addClass("lightcoralPlaceholder");
      check = false;
    }
    if (!registerDate.val() || registerDate.val() == "hidden") {
      $(registerDate).addClass("lightcoralText");
      check = false;
    }
    if (registerDateDay =="") {
      // $(registerDateDay).addClass("lightcoralText");
      check = false;
    }
    if (!registerHairdress.val() || registerHairdress.val() == "hidden") {
      $(registerHairdress).addClass("lightcoralText");
      check = false;
    }
    if (!registerHairCut.val() || registerHairCut.val() == "hidden") {
      $(registerHairCut).parent().find(".filter-option-inner-inner").addClass("lightcoralText");
      check = false;
    }
    else {
      for (let i = 0; i < selected.length; i++) {
        let val = $(selected[i]).text();
        hairCutArr.push(val);
      }
      hairCut = hairCutArr.toString()
    }
    if (check) {
      let allData = {};
      allData["name"] = registerName.val();
      allData["age"] = registerAge.val();
      allData["number"] = registerNumber.val();
      allData["dateDay"] = registerDateDay;
      allData["date"] = registerDate.val();
      allData["hairdress"] = registerHairdress.val();
      allData["hairCut"] = hairCut;
      allData["price"] = getPrice();
      return allData;
    }


  }
  // this function removed all input texts

  function deleteAllData() {
    $("#registerName").val('');
    $("#registerAge").val("hidden")
    $("#registerNumber").val('');
    $("#registerDate").val("hidden")
    $("#registerHairdress").val("hidden")
    $("#registerHairCut").find("option").prop('disabled', true)
    $("#registerHairCut").selectpicker('val', '').selectpicker('refresh');



  }
  // This function summed all prices and returned value
  function getPrice() {
    let selected = $("#registerHairCut option:selected");
    let price = 0;;
    for (let i = 0; i < selected.length; i++) {
      let val = $(selected[i]).attr("value")
      price += parseInt(val);
    }
    return price;
  }
  // This function changed  price 
  function changePrice() {
    let price = getPrice();
    if (price)
      $("#registerPrice").text(price + " dram");
    else
      $("#registerPrice").text("0");
  }
  // on change age this function geted haircuts 
  function getHairCutsByAge(age) {

    $.ajax({
      type: "POST",
      url: "../tpl/requests.php",
      data: { getHairCutsByAge: age },
      success: function (data) {
        if (data) {
          let hairCutsArr = assocToArr(JSON.parse(data), "name")
          for (var i = 0; i < registerHairCut.length; i++) {
            if (hairCutsArr.indexOf((registerHairCut[i]).text) != -1)
              $(registerHairCut[i]).prop('disabled', false);
            else
              $(registerHairCut[i]).prop('selected', false).prop('disabled', true);
          }
          $("#registerHairCut").selectpicker('refresh')
          changePrice();
        }
      }
    });

  }
  // on change hairdress this function geted free hours 
  function getDateByHairdress(hairdress, dateDay) {
    $.ajax({
      type: "POST",
      url: "../tpl/requests.php",
      data: { getDateByHairdress: [hairdress, dateDay] },
      success: function (data) {
        if (data) {
          let dateArr = assocToArr(JSON.parse(data), "date")
          for (var i = 0; i < registerDate.length; i++) {
            if (dateArr.indexOf((registerDate[i]).text) != -1)
              $(registerDate[i]).prop('selected', false).prop('disabled', true);
            else
              $(registerDate[i]).prop('disabled', false);
          }
        }
      }
    });

  }
  //this function sended the associative array as usual
  function assocToArr(data, val) {
    var arr = [];
    for (var i = 0; i < data.length; i++) {
      arr.push(data[i][val])
    }
    return arr;
  }
  //this function sended mail on success
  function sendMail(data) {
    let hairdressId = $("#registerHairdress").val();
    $.ajax({
      type: "POST",
      url: "../tpl/requests.php",
      data: { sendMail: [hairdressId, data] },
      success: function (suc) {
        if (suc) {

        }
      }
    });
  }
  //this function disabiled days in datepicker
  function datePickerDisabileData(data = []) {
    var dataEnd = new Date();
    var dateStart = new Date();
    var days = [];
    for (let i = 0; i < data.length; i++) {
      days.push(new Date(data[i]))
    }
    dateStart.setDate(dateStart.getDate());
    dataEnd.setDate(dateStart.getDate() + 5);
    $('#registerDateDay').datepicker({
      onSelect: function() {
        alert();
    },
      uiLibrary: 'bootstrap4',
      format: 'dd-mm-yyyy',
      language: 'am',
      startDate: dateStart,
      datesDisabled: days,
      endDate: dataEnd,
      daysOfWeekDisabled: "6",
    }).on('changeDate', function(ev){
      registerDateDayChange()
  });
    // $("#registerDateDay").datepicker("setDate", dateStart);

    // console.log(days)
    // console.log(dateStart)
    // for (let i = 0; i < days.length; i++) {
    //   if (dateStart == days[i]) {
    //     console.log(1212)
    //   }
      
    // }
    // $("#registerDateDay").datepicker("setDate", dateStart);
  }
});