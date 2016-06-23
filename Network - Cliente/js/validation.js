/*
function MascaraData(data){
    if(mascaraInteiro(data)==false){
        event.returnValue = false;
    }
    return formataCampo(data, '00-00-0000', event);
}

//valida data
function ValidaData(data){
    exp = /-d{2}\/-d{2}\/-d{4}/
    if(!exp.test(data.value))
        alert('Data Invalida!');
}

//valida numero inteiro com mascara
function mascaraInteiro(){
    if (event.keyCode < 48 || event.keyCode > 57){
        event.returnValue = false;
        return false;
    }
    return true;
}

//formata de forma generica os campos
function formataCampo(campo, Mascara, evento) {
    var boleanoMascara;

    var Digitato = evento.keyCode;
    exp = /\-|\.|\/|\(|\)| /g
    campoSoNumeros = campo.value.toString().replace( exp, "" );

    var posicaoCampo = 0;
    var NovoValorCampo="";
    var TamanhoMascara = campoSoNumeros.length;;

    if (Digitato != 8) { // backspace
        for(i=0; i<= TamanhoMascara; i++) {
            boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
            || (Mascara.charAt(i) == "/"))
            boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(")
                || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " "))
            if (boleanoMascara) {
                NovoValorCampo += Mascara.charAt(i);
                TamanhoMascara++;
            }else {
                NovoValorCampo += campoSoNumeros.charAt(posicaoCampo);
                posicaoCampo++;
            }
        }
        campo.value = NovoValorCampo;
        return true;
    }else {
        return true;
    }
}
*/

<!-- Photos -->
var app = angular.module('photoUser', []);
app.controller('photoUserCtrl', function($scope,$http) {
    $http({
        method: "GET",
        url: "http://localhost/Network/photo/?owner=?&name_album=?&description=?"
    }).then(function mySucces(response) {
        $scope.myData = response.data;
    }, function myError(response) {
        $scope.myData = response.statusText;
    });

    $scope.deletePhoto = function (id) {
        $http.delete("http://localhost/Network/photo/?id=" + id).success(function (data) {
        });
    }
});

<!-- User -->
var app = angular.module('friendsUser', []);
app.controller('friendsUserCtrl', function($scope,$http){
    $http({
        method: "GET",
        url: "http://localhost/Network/user/?firstName=?&lastName=?&country=?&birthday=?&email=?&password=?"
    }).then(function mySucces(response) {
        $scope.myData = response.data;
    }, function myError(response) {
        $scope.myData = response.statusText;
    });

    $scope.deleteUser = function (id) {
        $http.delete("http://localhost/Network/user/?id=" + id).success(function (data) {
        });
    };
});

<!-- Group -->
var app = angular.module('groupUser', []);
app.controller('groupUserCtrl', function($scope,$http) {
    $http({
        method: "GET",
        url: "http://localhost/Network/group/?groupName=?&owner=?&category=?"
    }).then(function mySucces(response) {
        $scope.myData = response.data;
    }, function myError(response) {
        $scope.myData = response.statusText;
    });

    $scope.deleteGroup = function (id) {
        $http.delete("http://localhost/Network/group/?id=" + id).success(function (data) {
        });
    }
});

<!-- Message -->
var app = angular.module('messageUser', []);
app.controller('messageUserCtrl', function($scope,$http) {
    $http({
        method: "GET",
        url: "http://localhost/Network/message/?description=?&user=?"
    }).then(function mySucces(response) {
        $scope.myData = response.data;
    }, function myError(response) {
        $scope.myData = response.statusText;
    });

    $scope.deleteMessage = function (id) {
        $http.delete("http://localhost/Network/message/?id=" + id).success(function (data) {
        });
    }
});

<!-- Login -->
var app = angular.module('loginUser',[]);
app.controller('loginUserCtrl', function ($scope, $http) {
   $scope.loginUser = function (user) {
       // console.log(user);
     $http.get("http://localhost/Network/user/?firstName=" + user.firstName + "&password=" + user.password).success(function (data) {
        if(data.length == 1){
            location.assign("initial_page.html");
        }else{
            alert("Name/Password are wrong!");
        }
     });
   };
});



