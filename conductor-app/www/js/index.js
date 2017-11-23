var global_data = {};

var loadModule = null;
var openModal = null;

var modalDataTemp = null;

function chocolate(){
    return "bakero"
}

$(document).ready(function(){
    if(!!window.localStorage.getItem("id")){
        $.mobile.navigate( "#main" ,{});
    }

    // User phone
    $("#loginPhoneForm")
    .submit(function(e){
        e.preventDefault();
        $.mobile.loading('show', {
          theme: "b"
        });
        
        $form = $(this)

        axios.post("http://www.rick-garcia.com/Transporte/api/driverLogin/",$form.serialize())
        .then(function(response){
            response = response.data;
            if(response.success){
                window.localStorage.setItem("name", response.data.nombre_persona + " " + response.data.apepat_persona + " " + response.data.apemat_persona);
                window.localStorage.setItem("id", response.data.id);
                window.localStorage.setItem("email", response.data.email);
                window.localStorage.setItem("persona_id", response.data.persona_id);
                window.localStorage.setItem("asistencia", "");
                $.mobile.navigate( "#main" ,{});
            }else{
                alert("Datos Incorrectos")
            }
        },function(){
            alert("Error! Prueba en 5 minutos");
        })
        .then(function(){
            $.mobile.loading('hide');
        })
    })


    $("#registerUserForm")
    .submit(function(e){
        e.preventDefault();
        var nuevos_datos = $(this).serializeArray();
        nuevos_datos.push({name:"telefono",value: global_data.number});
        console.log("enviando",nuevos_datos)
        axios.post('http://www.rick-garcia.com/Transporte/api/registerUser',$.param(nuevos_datos))
        .then(function(response){
            user = response.data;
            window.localStorage.setItem("nombre", user.data.nombres + " " + user.data.apellido_paterno);
            window.localStorage.setItem("dni", user.data.identificacion);
            window.localStorage.setItem("id", user.data.id);
            window.localStorage.setItem("telefono", user.data.telefono);
            $.mobile.navigate( "#main" ,{});
        })
    })


    $( document ).on( "pagecreate", "#main", function() {
        $( document ).on( "swipeleft swiperight", "#main", function( e ) {
            if ( $( ".ui-page-active" ).jqmData( "panel" ) !== "open" ) {
                if ( e.type === "swipeleft" ) {
                    $( "#sidebar" ).panel( "open" );
                }
            }
        });
    });

    $("#btnCerrarSesion")
    .click(function(e){
        e.preventDefault();
        if(confirm("Deseas cerrar sesion?")){
            window.localStorage.clear();
            $.mobile.navigate( "#loginUserPhone" ,{});
        }
    })


    $("#user_name_label").html(window.localStorage.getItem("nombre")).css('textTransform', 'capitalize');
    $("#dni_label").html(window.localStorage.getItem("dni"));

    var $container = $("#container");

    var firstRequest = true;

    openModal = function(name,data){
        $.mobile.changePage( "modal/" + name + ".html?" + (new Date()).getTime(), { role: "dialog" } );
        modalDataTemp = data;
        // $.get("modal/" + name + ".html",function(r){
        //     console.log(r)
        // })
    }

    $(document).on("pagechange",function(e,data){
        if(data.options.role === "dialog"){
            console.log(data)
            if(!!data.options.data && !!data.options.data.dni){

                $("input#iDNI").prop("readOnly",true).val(data.options.data.dni)
            }
        }
    })

    loadModule = function(name) {

        $.mobile.loading('show', {
          theme: "b"
        });

        var today = moment().format("MM-DD-YYYY");
        var blocked = false;
        if(today !== window.localStorage.getItem('asistencia')){
            global_data['next_url'] = name;
            name = "marcar_asistencia";
            blocked = true;
        }

        if(name === "cobrar" && !window.localStorage.getItem("en_ruta")){
            if(!firstRequest)
                alert("No estas en ruta. Redirigiendote a la pantalla de marcado de ruta.");
            name = "ruta";
        }

        // $( "#sidebar" ).panel( "close" );
        $container.load("pantallas/" + name + ".html?" + (new Date()).getTime(),function(d){
            $(this).trigger("create");
            $.mobile.loading('hide');
            if(blocked){
                if(firstRequest === true){
                }else{
                    alert("Debes marcar asistencia primero!");
                }
            }
        })
        // $container.enhanceWithin()
        // $container.trigger("create")
        // alert($(this).data('page'))
        firstRequest = false;
        
    }

    // $(".optMenu")
    // .click(function(e){
    //     e.stopImmediatePropagation();
    //     loadModule($(this).data('page'));
    // })

    $('body').on('click','.optMenu',function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        loadModule($(this).data('page'));
    });

    loadModule("cobrar")


    $('body').delegate( "a#btnCargarSaldoModal", "click", function() {
        var dni = $("input#iDNIModal").val();
        var monto = parseFloat($("input#iMontoModal").val());

        if(confirm("Cargar " + monto + " soles al DNI " + dni + "?")){
            $.post("http://www.rick-garcia.com/Transporte/api/offlineCharge",{
                dni: dni,
                monto: monto
            },function(data){
                console.log(data);
                if(data.success == true){
                    alert("Carga realizada con exito");
                }else{
                    alert("No se pudo cargar, vuelve a intentar en unos momentos.");
                }
                $('#modal').dialog('close');
            });
        }

    });
    
});

