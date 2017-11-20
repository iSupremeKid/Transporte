var global_data = {};

var loadModule = null;


$(document).bind('pageinit',function(){
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
        // $( "#sidebar" ).panel( "close" );
        $container.load("pantallas/" + name + ".html",function(d){
            $(this).trigger("create");
            $.mobile.loading('hide');
            if(blocked){
                if(firstRequest === true){
                    firstRequest = false;
                }else{
                    alert("Debes marcar asistencia primero!");
                }
            }
        })
        // $container.enhanceWithin()
        // $container.trigger("create")
        // alert($(this).data('page'))
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
    
});

