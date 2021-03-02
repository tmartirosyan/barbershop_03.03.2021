$(document).ready(function () {
    $(".confirmOrder").on("click", function () {
        var button = this;
        let confirmOrderId = $(this).parent().parent().attr("data-index");
        $.ajax({
            type: "POST",
            url: "tplAdmin/requests.php",
            data: { confirmOrder: confirmOrderId },
            success: function (suc) {
                if (suc) {
                    $(button).removeClass("btn-primary confirmOrder").addClass("btn-success deleteOrder").text("hastatvac e");
                }
            }
        });
    })
    $(".deleteOrder").on("click", function () {
        let deleteOrderId = $(this).parent().parent().attr("data-index");
        $.ajax({
            type: "POST",
            url: "tplAdmin/requests.php",
            data: { deleteOrder: deleteOrderId },
            success: function (suc) {
                if (suc) {
                    $(".orders[data-index=" + deleteOrderId + "]").remove();
                    $("#collapseExample" + deleteOrderId).remove();
                }
            }
        });
    })
    $("#removeAllOrders").on("click", function () {
        $.ajax({
            type: "POST",
            url: "tplAdmin/requests.php",
            data: { removeAllOrders: true },
            success: function (suc) {
                if (suc) {
                    alert("bolor patvernery jnjvac en");
                    setTimeout(() => {
                        location.reload();

                    }, 3000);
                }
            }
        });
    })

    $.ajax({
        type: "POST",
        url: "tplAdmin/requests.php",
        data: { getDateDays: true },
        success: function (suc) {
            if (suc) {
                var assoc = JSON.parse(suc)
                var days = assocToArr(assoc, "days")
                datePickerSelectData(days);
            }
        }
    });


    function datePickerSelectData(data = []) {
        $input = $(".setDateDayChangesDiv div");
        var dataEnd = new Date();
        var dateStart = new Date();
        var days = [];
        for (let i = 0; i < data.length; i++) {
            days.push(new Date(data[i]))
        }
        dateStart.setDate(dateStart.getDate());
        dataEnd.setDate(dateStart.getDate() + 20);

        $input.datepicker({
            uiLibrary: 'bootstrap4',
            multidate: true,
            format: 'dd-mm-yyyy',
            language: 'am',
            startDate: dateStart,
            endDate: dataEnd,
            daysOfWeekDisabled: "6"
        }).on('changeDate', function (ev) {
            var inputValue = $("#setDateDayChanges").data('datepicker').getFormattedDate('dd-mm-yyyy');
            var inputValueArr = inputValue.split(",");
            $.ajax({
                type: "POST",
                url: "tplAdmin/requests.php",
                data: { setDateDayChanges: inputValueArr },
                success: function (suc) {
                    if (suc) {
                    }
                }
            });
        });
        $input.datepicker("setDates", days);
    }
    function assocToArr(data, val) {
        var arr = [];
        for (var i = 0; i < data.length; i++) {
            arr.push(data[i][val])
        }
        return arr;
    }
})

