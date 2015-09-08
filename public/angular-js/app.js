
var app = angular.module('main', ['xeditable','angularUtils.directives.dirPagination']);
// TAG MANAGER
app.controller('Tags',function($scope,$http){
    loadData();
    $scope.refresh = function(){
        loadData();
    };
    $scope.AddTag = function(){
        var arr = {
            'name':$scope.name,
            'slug':$scope.slug,
            'lang_id':$scope.lang_id
        };
        $http({
            method: "POST",
            url: "/admin/post/add-tag",
            headers: { 'Content-Type' : 'application/x-www-form-urlencoded'},
            data: $.param(arr)
        }).success(function(){
            loadData();
        });
    };
    $scope.RemoveTag = function(id){
        $http.get('/admin/post/remove-tag/'+id).success(function(){
            loadData();
        });

    };
    $scope.SaveTag = function(data,id){
        angular.extend(data, {id: id});
        return $http.post('/admin/post/save-tag', data);
    };

    $scope.AddLang = function(){
        var arr1 = {
            'name':$scope.lang_name,
            'slug':$scope.lang_slug
        };
        $http({
            method: "POST",
            url: "/admin/post/add-lang",
            headers: { 'Content-Type' : 'application/x-www-form-urlencoded'},
            data: $.param(arr1)
        }).success(function(data){
            loadData();
            $scope.msgs = data;
        });

    };
    $scope.deleteLang = function(index,id){
        $http.get('/admin/post/remove-lang/'+id).success(function(data){
            $scope.msgs = data;
        });
        $scope.languages.splice(index,1);
    };
    function loadData(){
        $http.get('/admin/api/backend/tagsbylang').success(function(data){
            $scope.languages = data;
        });
    }

});
// USER MANAGER
app.controller('UserController',function($scope,$http,$location,$filter){
    $scope.currentPage = 1;
    $scope.pageSize = 10;
    loadData();
    $scope.refresh = function(){
        loadData();
    }
    $scope.roles = [
        {value: '1', name: 'admin'},
        {value: '2', name: 'shop_manager'},
        {value: '3', name: 'article_manager'},
        {value: '4' , name:'customer'}
    ];
    $scope.roless = [
        {value: 'admin', name: 'admin'},
        {value: 'shop_manager', name: 'shop_manager'},
        {value: 'article_manager', name: 'article_manager'},
        {value: 'customer' , name:'customer'}
    ];
    $scope.showRoles= function(user) {
        var selected = [];
        if(user.role) {
            selected = $filter('filter')($scope.roless, {name: user.role});
        }
        return selected.length ? selected[0].text : 'Not set';
    };

    $scope.AddUser = function(){
        var arr = {
            'name':$scope.name,
            'email':$scope.email,
            'password':$scope.password,
            'role_id':$scope.role_id
        }
        $http({
            method: "POST",
            url: "/admin/user/add-user",
            headers: { 'Content-Type' : 'application/x-www-form-urlencoded'},
            data: $.param(arr)
        });
        loadData();
    }
    $scope.saveUser = function(data,id){
        angular.extend(data, {id: id});
        return $http.post('/admin/user/update-user', data);

    };

    function loadData(){
        $http.get("/admin/api/backend/user/all")
            .success(function(data) {
                $scope.users = data;
            });
    }
});
//POST MANAGER
app.controller('AllPost',function($http,$scope){
    $scope.currentPage = 1;
    $scope.pageSize = 10;
    $scope.isLoading = false;
    loadData();
    function loadData(){
        $scope.isLoading = true;
        $http.get("/admin/api/backend/post/all")
            .success(function(data) {
                $scope.posts = data;
            });
        $scope.isLoading=false;
    }
    $scope.setDisableHot = function(id){
        $http.get('/admin/post/set-disable-hot/'+id).success(function(){
            loadData();
        });
    };
    $scope.setEnableHot = function(id){
        $http.get('/admin/post/set-enable-hot/'+id).success(function(){
            loadData();
        });
    };
    $scope.setDisableSticky = function(id){
        $http.get('/admin/post/set-disable-sticky/'+id).success(function(){
            loadData();
        });
    };
    $scope.setEnableSticky = function(id){
        $http.get('/admin/post/set-enable-sticky/'+id).success(function(){
            loadData();
        });
    };
    $scope.moveTrash = function(index,id){
        $scope.posts.splice(index,1);
        $http.get('/admin/post/move-trash/'+id).success(function(data){
                $scope.msg = data;
        }).errors(function(){
                $scope.msg = 'Request fail!';
        });
    }
});
app.controller('PostTrash',function($http,$scope){
    $scope.currentPage = 1;
    $scope.pageSize = 10;
    loadData();
    $scope.removePost = function(index,id){
        $scope.posts.splice(index,1);
        $http.get('/admin/post/remove-post/'+id).success(function(data){
            $scope.msg = data;
        }).errors(function(){
            $scope.msg = 'Request fail!';
        });
    };
    $scope.restorePost = function(index,id){
        $scope.posts.splice(index,1);
        $http.get('/admin/post/restore-post/'+id).success(function(data){
            $scope.msg = data;
        }).errors(function(){
            $scope.msg = 'Request fail!';
        });
    };
    function loadData(){
        $http.get("/admin/api/backend/post/trash")
            .success(function(data) {
                $scope.posts = data;
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
//Really Remove
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

app.controller('Attribute',function($scope, $http){
    loadData();

    $scope.CreateAttributeCategory = function(){
        $http({
            method: "POST",
            url: "/admin/ecommerce/attributes/create-attribute-category",
            headers: { 'Content-Type' : 'application/x-www-form-urlencoded'},
            data: $.param({'name':$scope.category_name})
        }).success(function(data){
            $scope.msg = data;
            loadData();
        });
        $scope.category_name= "";
    };
    $scope.RemoveAttributeCategory = function(index,id){
        $scope.attributes_cate.splice(index,1);
        $http.get('/admin/ecommerce/attributes/delete-attribute-category/'+id).success(function(data){
            $scope.msg = data;
            loadData();
        });
    }

    $scope.AttributeCreate = function(){
        var arr = {
            'name':$scope.attribute_name,
            'att_category_id':$scope.attribute_category_id
        };
        $http({
            method: "POST",
            url: "/admin/ecommerce/attributes/create-attribute",
            headers: { 'Content-Type' : 'application/x-www-form-urlencoded'},
            data: $.param(arr)
        }).success(function(data){
            $scope.msg = data;
            loadData();
        });
        $scope.attribute_name = "";

    };
    $scope.SaveAttribute = function(data,id){
        angular.extend(data, {id: id});
        return $http.post('/admin/ecommerce/attributes/update-attribute', data).success(function(data){
            $scope.msg = data;
        });
    }
    $scope.RemoveAttribute = function(id){
        $http.get('/admin/ecommerce/attributes/delete-attribute/'+id).success(function(data){
            $scope.msg = data;
            loadData();
        });
    };
    function loadData(){
        $http.get('/admin/api/backend/ecommerce/attributes').success(function(data){
            $scope.attributes_cate = data;
        });
    }
});

app.controller('ProductAll',function($scope,$http){
    $scope.currentPage = 1;
    $scope.pageSize = 10;
    $scope.isLoading = false;
    loadData();
    function loadData(){
        $http.get('/admin/api/backend/ecommerce/all-product').success(function(data){
            $scope.products = data;
        });
    }
    $scope.DeleteProduct = function(index,id){
        $scope.products.splice(index,1);
        $http.get('/admin/ecommerce/product/delete-product/'+id).success(function(data){
            $scope.msg = data;
        });
    }
});


//***************** ORDER**********************
app.controller('Order',function($scope,$http,$filter){
    $scope.currentPage = 1;
    $scope.pageSize = 20;
    $scope.statuses = [
        {value: 'Chờ xử lý', text: 'Chờ xử lý'},
        {value: 'Đang xử lý', text: 'Đang xử lý'},
        {value: 'Hoàn thành', text: 'Hoàn thành'},
    ];
    loadData();
    $scope.saveOrder = function(data,id) {
        angular.extend(data, {id: id});
        return $http.post('/admin/ecommerce/orders/save-order', data);
    };
    $scope.showStatus = function(order) {
        var selected = [];
        if(order.status) {
            selected = $filter('filter')($scope.statuses, {value: order.status});
        }
        return selected.length ? selected[0].text : 'Not set';
    };
    function loadData(){
        $http.get("/admin/api/backend/ecommerce/all-order").success(function(data){
            $scope.orders = data;
        });
    }
});
//**********************Contact***************************
app.controller('ContactController',function($scope,$http){
    $scope.currentPage = 1;
    $scope.pageSize = 20;
    loadData();
    function loadData(){
        $http.get("/admin/api/backend/contacts/contact").success(function(data){
            $scope.contacts = data;
        });
    }
    $scope.DeleteContact = function(index,id){
        $scope.contacts.splice(index,1);
        $http.get('/admin/contacts/contact/delete-contact/'+id).success(function(data){
            $scope.msg = data;
        });
    }
});
//**********************Consult***************************
app.controller('ConsultController',function($scope,$http){
    $scope.currentPage = 1;
    $scope.pageSize = 20;
    loadData();
    function loadData(){
        $http.get("/admin/api/backend/contacts/consult").success(function(data){
            $scope.consults = data;
        });
    }
    $scope.DeleteConsult = function(index,id){
        $http.get('/admin/contacts/advisory/delete-advisory/'+id).success(function(data){
            $scope.msg = data;
            loadData();
        });
    }
});
//******************* COMMENT ****************************
app.controller('CommentController',function($scope,$http){
    $scope.currentPage = 1;
    $scope.pageSize = 20;
    loadData();
    function loadData(){
        $http.get("/admin/api/backend/manage/comments").success(function(data){
            $scope.comments = data;
        });
    }
    $scope.DeleteComment = function(index,id){
        $scope.comments.splice(index,1);
        $http.get("/admin/manage/comments/delete-comment/"+id).success(function(data){
            $scope.msg = data;
            loadData();
        });
    }
});
app.controller('RateController',function($scope,$http){
    $scope.currentPage = 1;
    $scope.pageSize = 20;
    loadData();
    function loadData(){
        $http.get("/admin/api/backend/manage/rates").success(function(data){
            $scope.rates = data;
        });
    }
    $scope.DeleteRate = function(index,id){
        $scope.rates.splice(index,1);
        $http.get("/admin/manage/rates/delete-rate/"+id).success(function(data){
            $scope.msg = data;
            loadData();
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
app.controller('EditImage',function($scope){
    $scope.isCollapsed = true;
});











