$('#bntBuscar').click(function(e) {
    PartN = $('#PartN').val();
    Desc = $('#Desc').val();
    if (PartN != null || Desc != null) {
        if (PartN != null) {
            PartNo(PartN);
        } else {
            if (Desc != null) {
                PartD(Desc);
            }
        }
    }
});

function ocultarSecciones() {
    $("#searchs").hide();
    $("#bars").hide();
    $('#carrusel-slides').html('');
}

$('.btnMenu').on('click', function(e) {
    e.preventDefault();

    $('.btnMenu').removeClass('active');
    $(this).addClass('active');
    ocultarSecciones();
    idd = $(this).attr('most');
    $('#' + idd).show();
    doo(idd);

});

$('#searchMod').click(function(e) {
    e.preventDefault();

    pn = $('#serachPn').val();
    console.log(pn);
    $.ajax({
        type: "POST",
        url: "./partials/tablemodal.php",
        data: { pn },
        dataType: "html",
        success: function(response) {
            if (response == "") {
                $('#serachPn').addClass('is-invalid');
                response = "<div class='conTablmod' style='width: 100%;height: 200px;overflow-x: auto;'>" +
                    "<table class='table table-borderles table-sm'>" +
                    "<thead><tr><th> Part No </th><th> Description </th><th> Qty </th></tr></thead>" +
                    "</table></div>";

                $('#confirm').attr('pn', '');
                $('#descp').text('');
                $('.conTablmod').html(response);
            } else {
                $('#serachPn').removeClass('is-invalid');
                $('#serachPn').addClass('is-valid');
                $('.conTablmod').html(response);
                $('#confirm').attr('pn', pn);

            }
        }
    });
    $.ajax({
        type: "POST",
        url: "./partials/desc.php",
        data: { pn },
        dataType: "html",
        success: function(response) {
            $('#descp').text(response);
        }
    });
});

$('#confirm').click(function(e) {
    e.preventDefault();


    pn = $('#confirm').attr('pn');
    opt = $('#confirm').attr('opt');
    qtyentre = $('#qtyentre').val();
    dte = $('#titulodelmodal').attr('dte');



    if (opt == 'add') {
        if (pn != '') {

            if (qtyentre != '') {

                $.ajax({
                    type: "POST",
                    url: "./partials/confirm.php",
                    data: { pn, qtyentre, dte },
                    dataType: "html",
                    success: function(response) {
                        console.log(response);

                        if (response == 'sucess') {

                            $('#serachPn').removeClass('is-valid');
                            $('#serachPn').removeClass('is-invalid');

                            $('#confirm').attr('pn', '')
                            $('#serachPn').val('');
                            $('#qtyentre').val('');
                            $('#modalFrom').modal('hide');
                            response = "<div class='conTablmod' style='width: 100%;height: 200px;overflow-x: auto;'>" +
                                "<table class='table table-borderles table-sm'>" +
                                "<thead><tr><th> Part No </th><th> Description </th><th> Qty </th></tr></thead>" +
                                "</table></div>";

                            $('#descp').text('');
                            $('.conTablmod').html(response);

                            swal("You clicked the button!", {
                                    icon: "success",
                                    buttons: {
                                        catch: {
                                            text: "Okay",
                                            value: "defeat",
                                        },
                                    },
                                })
                                .then((value) => {
                                    switch (value) {

                                        case "defeat":
                                            location.reload();
                                            break;


                                        default:
                                            location.reload();
                                    }
                                });

                        } else {
                            swal("Error!", "You clicked the button!", "error");
                        }
                    }
                });

            } else {
                $('#qtyentre').focus();
            }
        } else {
            $('#serachPn').focus();
        }
    }
    if (opt == 'editar') {
        $.ajax({
            type: "POST",
            url: "./partials/edit.php",
            data: { pn, qtyentre, dte },
            dataType: "html",
            success: function(response) {
                console.log(response);

                if (response == 'sucess') {

                    $('#serachPn').removeClass('is-valid');
                    $('#serachPn').removeClass('is-invalid');
                    $('#confirm').attr('opt', '');

                    $('#confirm').attr('pn', '')
                    $('#serachPn').val('');
                    $('#modalFrom').modal('hide');
                    response = "<div class='conTablmod' style='width: 100%;height: 200px;overflow-x: auto;'>" +
                        "<table class='table table-borderles table-sm'>" +
                        "<thead><tr><th> Part No </th><th> Description </th><th> Qty </th></tr></thead>" +
                        "</table></div>";

                    $('#descp').text('');
                    $('.conTablmod').html(response);

                    swal("You clicked the button!", {
                            icon: "success",
                            buttons: {
                                catch: {
                                    text: "Okay",
                                    value: "defeat",
                                },
                            },
                        })
                        .then((value) => {
                            switch (value) {

                                case "defeat":
                                    location.reload();
                                    break;


                                default:
                                    location.reload();
                            }
                        });


                } else {
                    swal("Error!", "You clicked the button!", "error");
                }
            }
        });
    }





});


$('#closerModal').click(function() {
    $('#serachPn').removeClass('is-valid');
    $('#serachPn').removeClass('is-invalid');

    $('#confirm').attr('pn', '')
    $('#serachPn').val('');
    $('#modalFrom').modal('hide');
    response = "<div class='conTablmod' style='width: 100%;height: 200px;overflow-x: auto;'>" +
        "<table class='table table-borderles table-sm'>" +
        "<thead><tr><th> Part No </th><th> Description </th><th> Qty </th></tr></thead>" +
        "</table></div>";

    $('#descp').text('');
    $('.conTablmod').html(response);
});

$(document).ready(function() {
    doo('bars');
});

function doo(key) {
    switch (key) {
        case 'bars':
            $.ajax({
                type: "POST",
                url: "./partials/grafi.php",
                data: {},
                dataType: "html",
                success: function(response) {
                    $('#carrusel-slides').html(response);
                    carSld.scrollLeft += 4500;
                }
            });

            break;
        case 'searchs':

            break;
        default:
            var ala;
            break;
    }
}
var pnP;

function btnN1(part) {

    var a = $('#id-' + part).attr('a');
    var pn = $('#id-' + part).attr('pn');
    pnP = pn;
    if (a == 0) {
        $('#id-' + part).attr('a', 1);
        chengIcon(part, a)
        $('.remGP').remove();
        $.ajax({
            type: "POST",
            url: "./partials/PartN1.php",
            data: { pn },
            dataType: "html",
            success: function(response) {
                $('#R' + part).after(response);
                console.log('#R' + part);
                $('.removePh').addClass('rem-' + part);
                $('.rem-' + part).removeClass('removePh');
            }
        });
    } else {

        $('.rem-' + part).remove();
        chengIcon(part, a);
        $('#id-' + part).attr('a', 0);
    }
}
var pnP2;

function btnN2(part) {
    var a = $('#id-' + part).attr('a');
    var pn = $('#id-' + part).attr('pn');
    pnP2 = pn;
    $('.remG').remove();

    if (a == 0) {
        $('#id-' + part).attr('a', 1);
        chengIcon(pn, a)
        $.ajax({
            type: "POST",
            url: "./partials/PartN1.php",
            data: { pn },
            dataType: "html",
            success: function(response) {
                $('#Rph' + pn).after(response);

                $('.removePh').addClass('rem-' + pnP);
                $('.removePh').addClass('remH-' + pn);
                $('.remH-' + pn).removeClass('removePh');
            }
        });
    } else {
        $('.remH-' + pn).remove();
        chengIcon(pn, a);
        $('#id-' + part).attr('a', 0);
    }

}

function btnN3(part) {
    var a = $('#id-' + part).attr('a');
    var pn = $('#id-' + part).attr('pn');
    $('.remGP3').remove();

    if (a == 0) {
        $('#id-' + part).attr('a', 1);
        chengIcon(pn, a)
        $.ajax({
            type: "POST",
            url: "./partials/PartChil.php",
            data: { pn },
            dataType: "html",
            success: function(response) {
                $('#Rph-' + pn).after(response);

                $('.removeCh').addClass('rem-' + pnP);
                $('.removeCh').addClass('remH-' + pnP2);
                $('.removeCh').addClass('remH3-' + pn);
                $('.remH3-' + pn).removeClass('removeCh3');
            }
        });
    } else {
        $('.remH3-' + pn).remove();
        chengIcon(pn, a);
        $('#id-' + part).attr('a', 0);
    }

}


function btnN1Up(part) {
    var a = $('#id-' + part).attr('up');
    var pn = $('#id-' + part).attr('pn');
    $('.remGP3').remove();

    if (a == 0) {
        $('#id-' + part).attr('up', 1);
        chengIconUp(part, a)
        $.ajax({
            type: "POST",
            url: "./partials/PartChil.php",
            data: { pn },
            dataType: "html",
            success: function(response) {
                $('#R' + part).after(response);

                $('.removeCh').addClass('rem-' + pnP);
                $('.removeCh').addClass('remH-' + pnP2);
                $('.removeCh').addClass('remH3-' + pn);
                $('.remH3-' + pn).removeClass('removeCh3');
            }
        });
    } else {
        $('.remH3-' + pn).remove();
        chengIconUp(part, a);
        $('#id-' + part).attr('up', 0);
    }

}

function btnN2Up(part) {
    var a = $('#id-' + part).attr('up');
    var pn = $('#id-' + part).attr('pn');
    $('.remGP3').remove();

    if (a == 0) {
        $('#id-' + part).attr('up', 1);
        chengIconUp(pn, a)
        $.ajax({
            type: "POST",
            url: "./partials/PartChil.php",
            data: { pn },
            dataType: "html",
            success: function(response) {
                $('#Rph' + pn).after(response);

                $('.removeCh').addClass('rem-' + pnP);
                $('.removeCh').addClass('remH-' + pnP2);
                $('.removeCh').addClass('remH3-' + pn);
                $('.remH3-' + pn).removeClass('removeCh3');
            }
        });
    } else {
        $('.remH3-' + pn).remove();
        chengIconUp(pn, a);
        $('#id-' + part).attr('up', 0);
    }

}


function chengIcon(pn, active) {
    if (active == 0) {
        $('#icon-' + pn).removeClass('fa-chevron-right');
        $('#icon-' + pn).addClass('fa-chevron-down');
    } else {
        $('#icon-' + pn).removeClass('fa-chevron-down');
        $('#icon-' + pn).addClass('fa-chevron-right');
    }
}

function chengIconUp(pn, active) {
    if (active == 0) {
        $('#iconUp-' + pn).removeClass('fa-chevron-up');
        $('#iconUp-' + pn).addClass('fa-chevron-down');
    } else {
        $('#iconUp-' + pn).removeClass('fa-chevron-down');
        $('#iconUp-' + pn).addClass('fa-chevron-up');
    }
}

function PartNo(PartN) {
    $.ajax({
        type: "POST",
        url: "./partials/PartNS.php",
        data: { PartN },
        dataType: "html",
        success: function(response) {
            $('.conTabl').html(response);
        }
    });
}

function PartD(Desc) {
    $.ajax({
        type: "POST",
        url: "./partials/table.php",
        data: { Desc },
        dataType: "html",
        success: function(response) {
            $('.conTabl').html(response);
        }
    });
}

const carSld = document.getElementById("carrusel-slides");
const carSlds = document.querySelector("#carrusel-slides .slide");
const carRight = document.querySelector(".btn-next");
const carLeft = document.querySelector(".btn-prev");
let direction;

carRight.onclick = function() {
    carSld.scrollLeft += 220;
};

carLeft.onclick = function() {
    carSld.scrollLeft -= 220;
};