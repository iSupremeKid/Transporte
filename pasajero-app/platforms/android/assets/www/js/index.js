var global_data = {};
$(document).on('deviceready',function(){
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
        var number = $(this)
        .find("#passenger_phone")
        .val();
        axios({
          method: 'post',
          url: 'https://api.authy.com/protected/json/phones/verification/start',
          data: {
            via: 'sms',
            phone_number: number,
            country_code: 51,
            locale: 'es'
          },
          headers: {
            "X-Authy-API-Key": "PnKtYn547C8GysxGUiX8OZIaRe9DLzTM"
          }
        })
        .then(function(response){
            response = response.data;
            if(response.success === true){
                $.mobile.loading('hide');
                global_data = {number: number}
                $.mobile.navigate( "#confirmPhone" ,{});
            }else{
                alert("Ocurrio un error!")
            }
        },function(err){
            $.mobile.loading('hide');
            alert("Error!")
        });
    })

    // Verify number
    $("#validatePhoneForm")
    .submit(function(e){
        e.preventDefault();
        $.mobile.loading('show', {
          theme: "b"
        });
        var validation = $(this)
        .find("#validation_code")
        .val();
        axios({

          method: 'get',
          url: 'https://api.authy.com/protected/json/phones/verification/check?phone_number=' + global_data.number + '&country_code=51&verification_code=' + validation,
          data: {
          },
          headers: {
            "X-Authy-API-Key": "PnKtYn547C8GysxGUiX8OZIaRe9DLzTM"
          }
        })
        .then(function(response){
            response = response.data;
            if(response.success === true){
                // Numero correcto
                // TODO: hacer request a API preguntando si existe el usuario y guardar en resultado en la variable user
                
                axios({
                    method: "get",
                    url: "http://www.rick-garcia.com/Transporte/api/checkUserExist/" + global_data.number,
                    data: {}
                })
                .then(function(response){
                    var user = response.data;
                    $.mobile.loading('hide');
                    console.log(user)
                    if(user.success){
                        window.localStorage.setItem("nombre", user.data.nombres + " " + user.data.apellido_paterno);
                        window.localStorage.setItem("dni", user.data.identificacion);
                        window.localStorage.setItem("id", user.data.id);
                        window.localStorage.setItem("telefono", user.data.telefono);
                        console.log(window.localStorage)
                        alert("Bienvenido nuevamente " + user.data.nombres + "!")
                        location.reload()
                    }else{
                        $.mobile.navigate( "#registerUser" ,{});
                    }

                })
                
            }else{
                alert("Codigo incorrecto!")
            }
        },function(){
            $.mobile.loading('hide');
            alert("Codigo incorrecto!")
        });
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
            // $.mobile.navigate( "#main" ,{});
            alert("Bienvenido " + user.data.nombres + "!")
            location.reload()
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

    $(".optMenu")
    .click(function(){
        $( "#sidebar" ).panel( "close" );
        $container.load("pantallas/" + $(this).data('page') + ".html",function(data){
            $container.trigger("create")
        });
        // alert($(this).data('page'))
    })
    $container.load("pantallas/home.html",function(data){
        $container.trigger("create")
    });
});

