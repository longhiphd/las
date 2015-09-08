var app = angular.module('main', [
    "ngSanitize",
    "angularUtils.directives.dirPagination",
    "ui.router"
]);
app.config(function($stateProvider, $urlRouterProvider) {
    $urlRouterProvider.otherwise("/");
    $stateProvider
        .state('index', {
            url: "/",
            templateUrl: "/theme/index.html",
            controller: "HomeController",
            data : { pageTitle: 'Trang chủ | Mir' }
        })
        .state('danh-muc', {
            url: "/danh-muc/:slug",
            templateUrl: "/theme/product.html",
            controller: "CategoryProduct",
            cache:true,
            data : { 
                pageTitle:  'Danh mục sản phẩm | Mir'
                 }

        })
        .state('gio-hang', {
            url: "/gio-hang",
            templateUrl: '/theme/cart.html',
            controller:'CartController',
            cache:true,
            data : { pageTitle: 'Giỏ hàng | Mir' }
        })
        .state('san-pham', {
            url: "/san-pham/:slug",
            templateUrl: '/theme/product-detail.html',
            controller:'ProductController',
            cache:true
        })
        .state('thanh-toan', {
            url: "/thanh-toan",
            templateUrl: '/theme/checkout.html',
            controller:'CheckoutController',
            cache:true,
            data : { pageTitle: 'Thanh toán | Mir' }
        })
        .state('tu-van', {
            url: "/tu-van",
            templateUrl: '/theme/consult.html',
            controller:'ConsultController',
            cache:true,
            data : { pageTitle: 'Tư vấn | Mir' }
        })
        .state('tim-kiem', {
            url: "/tim-kiem?category&search",
            templateUrl: '/theme/product-search.html',
            controller:'SearchController',
            cache:true,
            data : { pageTitle: 'Tìm kiếm | Mir' }
        })
        .state('lien-he', {
            url: "/lien-he",
            templateUrl: '/theme/contact.html',
            controller:'ContactController',
            cache:true,
            data : { pageTitle: 'Liên hệ | Mir' }
        })
        .state('trang-tin', {
            url: "/trang-tin/:slug",
            templateUrl: '/theme/blog.html',
            controller:'BlogController',
            cache:true,
            data : { pageTitle: 'Trang tin | Mir' }
        })
        .state('chi-tiet', {
            url: "/chi-tiet/:singleslug",
            templateUrl: '/theme/news-detail.html',
            controller:'SingleBlogController',
            cache:true
        })
        .state('design', {
            url: "/thiet-ke",
            templateUrl: '/theme/design.html',
            cache:true,
            data : { pageTitle: 'Báo giá thiết kế | Mir' }
        });

});
app.run(function($rootScope){
    $rootScope.$on('$stateChangeStart',
        function(){
            $("html, body").animate({ scrollTop: 0 }, 300);
        });
    $rootScope.$on('$stateChangeSuccess',
        function(){

        });
});
app.filter('myDateFormat', function myDateFormat($filter){
    return function(text){
        var  tempdate= new Date(text.replace(/-/g,"/"));
        return $filter('date')(tempdate, "dd-MM");
    }
});
//*************************CONTROLLER***********************************
app.controller('CartCount',function($scope,$http,$timeout){
    $scope.getData = function(){
        $http.get('/api/frontend/theme-option').then(function(res){
            $scope.cart_count = res.data.cart_count;
        });
    };
    $scope.intervalFunction = function(){
        $timeout(function() {
            $scope.getData();
            $scope.intervalFunction();
        }, 3000)
    };
    $scope.intervalFunction();
});
app.controller('ThemeController',function($scope,$http,$location,$window,$timeout){
    loadData();
    function loadData(){
        $http.get('/api/frontend/theme-option').then(function(res){
            $scope.option = res.data.option;
            $scope.cart_count = res.data.cart_count;
        });
    }
    $scope.Search = function(){
        $location.url('/tim-kiem?category='+$scope.category+'&search='+$scope.search);
    }
    $scope.reload = function (){
        $scope.isReload = true;
        $window.location.reload();
        $scope.isReload = false;
    }

});
//CAROUSEL
app.controller('Carousel',function($scope,$http){
    loadData();
    function loadData(){
        $http.get('/api/frontend/theme-option').then(function(res){
            $scope.slides = res.data.slides;
        });
    }
});
//PRODUCT NEW
app.controller('ProductNew',function($scope,$http){
    loadData();
    function loadData(){
        $http.get('/api/frontend/new-product').then(function(res){
            $scope.products = res.data;
        });
    }
});
//BESTSELLING PRODUCT CONTROLLER
app.controller('BestSellingProduct',function($scope,$http){
    loadData();
    function loadData(){
        $http.get('/api/frontend/best-selling-product/').then(function(res){
            $scope.group = res.data;
        });
    }
});
//HOME CONTROLLER
app.controller('HomeController',function($scope,$http){
    loadData();
    function loadData(){
        $http.get('/api/frontend/home').then(function(res){
            $scope.categories = res.data.categories;
            $scope.best_selling = res.data.best_selling;
            $scope.categories_custom = res.data.categories_custom;
            $scope.posts1 = res.data.posts1;
            $scope.posts2 = res.data.posts2;
            $scope.slides = res.data.slides;
        });
    }
});
//PRODUCT CATEGORY CONTROLLER
app.controller('CategoryProduct',function($scope,$http,$stateParams,$state){
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

//PRODUCT DETAIL CONTROLLER
app.controller('ProductController',function($scope,$http,$stateParams,$rootScope,ProductDetail){
    $scope.currentPage = 1;
    $scope.pageSize = 25;
    loadData();
    $scope.quantity = 1;
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
            $scope.msg = data;
        });
    };
    function loadData(){
        $http.get('/api/frontend/product/'+$stateParams.slug).success(function(data){
            $scope.product = data;
            $scope.rates = data.rates;
            $rootScope.productTitle = data.name;
        });
    }
    $scope.AddRate = function(){
        var arr = {
            'product_id':$scope.product.id,
            'rate':$scope.rate,
            'email':$scope.email,
            'name':$scope.name,
            'content':$scope.content
        }
        $http({
            method: "POST",
            url: "/add-rate",
            headers: { 'Content-Type' : 'application/x-www-form-urlencoded'},
            data: $.param(arr)

        }).success(function(data){
            $scope.msg_rate = data;
            loadData();
        });
    }
});

//CART CONTROLLER
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
            loadData();
        });
    }
});

//CHECKOUT CONTROLLER
app.controller('CheckoutController',function($scope,$http){
    $scope.isChecked = false;
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
    $scope.cities = [
        {value:'An Giang',name:'An Giang'},
        {value:'Bà Rịa - Vũng Tàu',name:'Bà Rịa - Vũng Tàu'},
        {value:'Bắc Giang',name:'Bắc Giang'},
        {value:'Bắc Kạn',name:'Bắc Kạn'},
        {value:'Bạc Liêu',name:'Bạc Liêu'},
        {value:'Bắc Ninh',name:'Bắc Ninh'},
        {value:'Bến Tre',name:'Bến Tre'},
        {value:'Bình Định',name:'Bình Định'},
        {value:'Bình Dương',name:'Bình Dương'},
        {value:'Bình Phước',name:'Bình Phước'},
        {value:'Bình Thuận',name:'Bình Thuận'},
        {value:'Cà Mau',name:'Cà Mau'},
        {value:'Cao Bằng',name:'Cao Bằng'},
        {value:'Đắk Lắk',name:'Đắk Lắk'},
        {value:'Đắk Nông',name:'Đắk Nông'},
        {value:'Điện Biên',name:'Điện Biên'},
        {value:'Đồng Nai',name:'Đồng Nai'},
        {value:'Đồng Tháp',name:'Đồng Tháp'},
        {value:'Gia Lai',name:'Gia Lai'},
        {value:'Hà Giang',name:'Hà Giang'},
        {value:'Hà Nam',name:'Hà Nam'},
        {value:'Hà Tĩnh',name:'Hà Tĩnh'},
        {value:'Hải Dương',name:'Hải Dương'},
        {value:'Hậu Giang',name:'Hậu Giang'},
        {value:'Hòa Bình',name:'Hòa Bình'},
        {value:'Hưng Yên',name:'Hưng Yên'},
        {value:'Khánh Hòa',name:'Khánh Hòa'},
        {value:'Kiên Giang',name:'Kiên Giang'},
        {value:'Kon Tum',name:'Kon Tum'},
        {value:'Lai Châu',name:'Lai Châu'},
        {value:'Lâm Đồng',name:'Lâm Đồng'},
        {value:'Lạng Sơn',name:'Lạng Sơn'},
        {value:'Lào Cai',name:'Lào Cai'},
        {value:'Long An',name:'Long An'},
        {value:'Nam Định',name:'Nam Định'},
        {value:'Nghệ An',name:'Nghệ An'},
        {value:'Ninh Bình',name:'Ninh Bình'},
        {value:'Ninh Thuận',name:'Ninh Thuận'},
        {value:'Phú Thọ',name:'Phú Thọ'},
        {value:'Quảng Bình',name:'Quảng Bình'},
        {value:'Quảng Nam',name:'Quảng Nam'},
        {value:'Quảng Ngãi',name:'Quảng Ngãi'},
        {value:'Quảng Ninh',name:'Quảng Ninh'},
        {value:'Quảng Trị',name:'Quảng Trị'},
        {value:'Sóc Trăng',name:'Sóc Trăng'},
        {value:'Sơn La',name:'Sơn La'},
        {value:'Tây Ninh',name:'Tây Ninh'},
        {value:'Thái Bình',name:'Thái Bình'},
        {value:'Thái Nguyên',name:'Thái Nguyên'},
        {value:'Thanh Hóa',name:'Thanh Hóa'},
        {value:'Thừa Thiên Huế',name:'Thừa Thiên Huế'},
        {value:'Tiền Giang',name:'Tiền Giang'},
        {value:'Trà Vinh',name:'Trà Vinh'},
        {value:'Tuyên Quang',name:'Tuyên Quang'},
        {value:'Vĩnh Long',name:'Vĩnh Long'},
        {value:'Vĩnh Phúc',name:'Vĩnh Phúc'},
        {value:'Yên Bái',name:'Yên Bái'},
        {value:'Phú Yên',name:'Phú Yên'},
        {value:'Cần Thơ',name:'Cần Thơ'},
        {value:'Đà Nẵng',name:'Đà Nẵng'},
        {value:'Hải Phòng',name:'Hải Phòng'},
        {value:'Hà Nội',name:'Hà Nội'},
        {value:'TP HCM',name:'TP HCM'}
    ]
});




//HOME ARTICLE CONTROLLER
app.controller('HomeArticle',function($scope,$http){
    loadData();
    function loadData(){
        $http.get('/api/frontend/home-article/').then(function(res){
            $scope.posts = res.data;
        });
    }

});

//SEARCH CONTROLLER
app.controller('SearchController',function($scope,$http,$stateParams){
    $scope.currentPage = 1;
    $scope.pageSize = 25;
    loadData();
    function loadData(){
        $http.get('/search?category='+$stateParams.category+'&search='+$stateParams.search).then(function(res){
            $scope.products = res.data;
        });
    }
});

//PAGINATE CONTROLLER
app.controller('OtherController', function($scope){
    OtherController();
    function OtherController() {
        $scope.pageChangeHandler = function(num) {
            console.log('going to page ' + num);
        };
    }
});

//CONSULT CONTROLLER
app.controller('ConsultController',function($scope,$http,$filter){

    $scope.CreateConsult = function(){
        var arr = {
            'title':$scope.title,
            'full_name':$scope.full_name,
            'phone':$scope.phone,
            'email':$scope.email,
            'address':$scope.address,
            'date':$filter('date')($scope.date, "yyyy/MM/dd"),
            'content':$scope.content
        }
        $http({
            method: "POST",
            url: "/create-consult",
            headers: { 'Content-Type' : 'application/x-www-form-urlencoded'},
            data: $.param(arr)
        }).success(function(data){
            $scope.msg = data;
        });

    }
});
app.controller('ContactController',function($scope,$http){
    $scope.CreateContact = function(){
        var arr = {
            'first_name':$scope.first_name,
            'last_name':$scope.last_name,
            'email':$scope.email,
            'phone':$scope.phone,
            'subject':$scope.subject,
            'content':$scope.content
        }
        $http({
            method: "POST",
            url: "/create-contact",
            headers: { 'Content-Type' : 'application/x-www-form-urlencoded'},
            data: $.param(arr)
        }).success(function(data){
            $scope.msg = data;
        });
    }
});

//BLOG CONTROLLER
app.controller('BlogController',function($scope,$http,$stateParams,$state){

    loadData();
    function loadData(){
        $http.get('/api/frontend/blog/' + $stateParams.slug).success(function(data){
            $scope.category = data;
        });
    }
});
app.controller('SingleBlogController',function($scope,$http,$stateParams,$state){

    loadData();
    function loadData(){
        $http.get('/api/frontend/blog/single/' + $stateParams.singleslug).success(function(data){
            $scope.post = data;
            $scope.comments = data.comments;
        });
    }
    $scope.AddComment = function(){
        var arr = {
            'post_id':$scope.post.id,
            'email':$scope.email,
            'name':$scope.name,
            'content':$scope.content
        }
        $http({
            method: "POST",
            url: "/add-post-comment",
            headers: { 'Content-Type' : 'application/x-www-form-urlencoded'},
            data: $.param(arr)
        }).success(function(data){
            $scope.msg = data;
            loadData();
            $scope.email = '';
            $scope.name = '';
            $scope.content ='';
        });
    }
});

//REALLY CLICK DIRECTIVE

app.controller('RecentPost',function($scope,$http){
    loadData();
    function loadData(){
        $http.get('/api/frontend/blog/sort/recent-post').success(function(data){
            $scope.posts = data;
        });
    }
});
app.directive('htmldiv', function($compile, $parse) {
    return {
        restrict: 'E',
        link: function(scope, element, attr) {
            scope.$watch(attr.content, function() {
                element.html($parse(attr.content)(scope));
                $compile(element.contents())(scope);
            }, true);
        }
    }
});

app.directive('title', ['$rootScope', '$timeout',
    function($rootScope, $timeout) {
        return {
            link: function() {
                var listener = function(event, toState) {
                    $timeout(function() {
                        $rootScope.title = (toState.data && toState.data.pageTitle)
                            ? toState.data.pageTitle
                            :'Mir';
                    });
                };
                $rootScope.$on('$stateChangeSuccess', listener);
            }
        };
    }
]);
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
