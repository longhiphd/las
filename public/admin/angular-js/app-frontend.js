var app = angular.module('main', ["xeditable","angularUtils.directives.dirPagination","ui.bootstrap","ui.router","ngSanitize","blockUI"]);
app.run(function(editableOptions) {
    editableOptions.theme = 'bs3';
});

app.config(function($stateProvider, $urlRouterProvider) {

    $stateProvider
        .state('index', {
            url: "/",
            templateUrl: "/theme/index.html",
            controller: "HomeController",
            cache: false
        })
        .state('danh-muc', {
            url: "/danh-muc/:slug",
            templateUrl: "/theme/product.html",
            controller: "CategoryProduct",
            cache: false
        })
        .state('gio-hang', {
            url: "/gio-hang",
            templateUrl: '/theme/cart.html',
            controller:'CartController',
            cache: false
        })
        .state('san-pham', {
            url: "/san-pham/:slug",
            templateUrl: '/theme/product-detail.html',
            controller:'ProductController',
            cache: false
        }).state('thanh-toan', {
            url: "/thanh-toan",
            templateUrl: '/theme/checkout.html',
            controller:'CheckoutController'
        }).state('tu-van', {
            url: "/tu-van",
            templateUrl: '/theme/consult.html',
            cache: false

        })
        .state('tim-kiem', {
            url: "/tim-kiem?category&search",
            templateUrl: '/theme/product-search.html',
            controller:'SearchController',
            cache: false

        });
    $urlRouterProvider.otherwise("/");
}).run(function($rootScope,blockUI) {
    $rootScope.$on('$stateChangeStart', function() {
        //blockUI.start();
        $rootScope.stateLoading = true;
    })

    $rootScope.$on('$stateChangeSuccess', function() {
        //blockUI.stop();
        $rootScope.stateLoading = false;
    })
});
app.controller('Carousel',function($scope,$http){
    $scope.myInterval = 5000;
    $scope.noWrapSlides = false;
    loadData();
    function loadData(){
        $http.get('/api/frontend/theme-option').success(function(data){
            $scope.slides = data.slides;
        });
    }
});
app.controller('HomeController',function($scope,$http){
    loadData();
    function loadData(){
        $http.get('/api/frontend/home').success(function(data){
            $scope.categories = data;
        });
    }
});
app.controller('ThemeController',function($scope,$http,$location){
    loadData();
    function loadData(){
        $http.get('/api/frontend/theme-option').success(function(data){
            $scope.option = data.option;
        });
    }
    $scope.Search = function(){
        $location.url('/tim-kiem?category='+$scope.category+'&search='+$scope.search);
    }
});
app.controller('ScriptController',function($scope,$http){
    loadData();
    function loadData(){
        $http.get('/api/frontend/theme-option').success(function(data){
            $scope.scripts = data.scripts;
        });
    }
});
app.controller('CategoryProduct',function($scope,$http,$stateParams){
    $scope.orderPrices = [
        {value: 'listed_price', name: 'Giá tăng dần'},
        {value: '-listed_price', name: 'Giá giảm dần'},
    ];

    $scope.currentPage = 1;
    $scope.pageSize = 25;
    $scope.items = ['foo', 'bar', 'foobar'];
    loadData();
    function loadData(){
        $http.get('/api/frontend/category/'+$stateParams.slug).success(function(data){
            $scope.categories = data;
        });
    }
});
app.controller('ProductController',function($scope,$http,$stateParams){
    $scope.currentPage = 1;
    $scope.pageSize = 25;
    loadData();
    $scope.quantity = 1;
    $scope.isLoading = false;
    $scope.AddToCart = function(){
        var arr = {
            'quantity':$scope.quantity,
            'product_id':$scope.product.id
        }
        $http({
            method: "POST",
            url: "/add-to-cart",
            headers: { 'Content-Type' : 'application/x-www-form-urlencoded'},
            data: $.param(arr)
        }).success(function(data){
            $scope.isLoading = true;
            $scope.msg = data;
            $scope.isLoading = false;
        });
    };
    function loadData(){
        $http.get('/api/frontend/product/'+$stateParams.slug).success(function(data){
            $scope.product = data;

        });
    }
});
app.controller('CartController',function($scope,$http){
    var arr = {
        'quantity':$scope.quantity,
        'rowId':$scope.rowId
    };
    $scope.Edit = true;
    $scope.Edit = function(){
        $scope.Edit = false;
    };
    loadData();
    function loadData(){
        $http.get('/api/frontend/cart/').success(function(data){
            $scope.carts = data;
        });
    }
    $scope.Delete = function(rowId){
        $http.get('/delete-row/'+rowId).success(function(data){
            $scope.msg = data;
            loadData();
        });
    }
    $scope.Update = function(){
        $http({
            method: "POST",
            url: "/update-cart",
            headers: { 'Content-Type' : 'application/x-www-form-urlencoded'},
            data: $.param(arr)
        }).success(function(data){
            $scope.msg = data;
        });
    }
});
app.controller('TeamplateController',function($scope,$http,$location){
    loadData();
    function loadData(){
        $http.get('/api/frontend/cart/').success(function(data){
            $scope.carts = data;
        });
    }

});
app.controller('CheckoutController',function($scope,$http){
    $scope.SaveOrder = function(){
        var arr = {
            'first_name':$scope.first_name,
            'last_name':$scope.last_name,
            'address':$scope.address,
            'city':$scope.city,
            'email':$scope.email,
            'phone':$scope.phone,
            'order_method':$scope.order_method,
            'note':$scope.note
        };
        $http({
            method: "POST",
            url: "/save-order",
            headers: { 'Content-Type' : 'application/x-www-form-urlencoded'},
            data: $.param(arr)
        }).success(function(data){
            $scope.msg = data;
        });
    }
});

app.controller('BestSellingProduct',function($scope,$http){
    loadData();
    function loadData(){
        $http.get('/api/frontend/best-selling-product/').success(function(data){
            $scope.group = data;
        });
    }
});
app.controller('HomeArticle',function($scope,$http){
    loadData();
    function loadData(){
        $http.get('/api/frontend/home-article/').success(function(data){
            $scope.posts = data;
        });
    }
});

//****************************SEARCHCONTROLLER**************************
app.controller('SearchController',function($scope,$http,$stateParams){
    $scope.currentPage = 1;
    $scope.pageSize = 25;
    loadData();
    function loadData(){
        $http.get('/search?category='+$stateParams.category+'&search='+$stateParams.search).success(function(data){
            $scope.products = data;
        });
    }
});

app.controller('OtherController', function($scope){
    OtherController();
    function OtherController() {
        $scope.pageChangeHandler = function(num) {
            console.log('going to page ' + num);
        };
    }
});
app.directive('ngReallyClick', [function() {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            element.bind('click', function() {
                var message = attrs.ngReallyMessage;
                if (message && confirm(message)) {
                    scope.$apply(attrs.ngReallyClick);
                }
            });
        }
    }
}]);


