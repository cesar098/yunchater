console.log();
$("#frmLogin").on('submit', function (e) {
    e.preventDefault();
    logina = $("#logina").val();
    clavea = $("#clavea").val();

    $.post("../ajax/administracion.php?op=verificar",
        { "logina": logina, "clavea": clavea },
        function (data) {
            console.log(data);
            if (!data) {
                window.location.href = "../index.html"; //back to history    
                //bootbox.alert("Uso Password incorrectos");       
            }
            else {
                alert("Usuario y/o Password incorrectos");
            }
        });
});