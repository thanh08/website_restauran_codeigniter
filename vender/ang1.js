var app = angular.module('myApp', ['ngMaterial']);
app.controller('controller2', function ($scope,$http,$mdToast) {
	$http.get("http://localhost/006/admin/getqladmin").then(function(res){
		$scope.taikhoan=res.data;
	});
	$scope.suataikhoan=function (mottk) {
		mottk.hienthi=!mottk.hienthi;
	}
	//thay đổi tài khoản 
	$scope.luutaikhoan=function (mottk) {
		mottk.hienthi=!mottk.hienthi;
		var data=$.param({
			id:mottk.id,
			ten:mottk.ten,
			taikhoan:mottk.taikhoan,
			sdt:mottk.sdt,
			email:mottk.email,
			matkhau:mottk.matkhau
		});
		var config ={
			headers:{
				'content-type':'application/x-www-form-urlencoded;charset=UTF-8'
			}
		}
		$http.post('http://localhost/006/admin/luuthaydoiadmin', data, config).then(function (res) {
			if (res.data='thanhcong') {}
			console.log(res.data);
		    $scope.showSimpleToast();
		}, 
		function (res) {
			console.log(res.data);
		});
	}
	var last = {
      bottom: true,
      top: false,
      left: false,
      right: true
    };

  $scope.toastPosition = angular.extend({},last);

  $scope.getToastPosition = function() {
    sanitizePosition();

    return Object.keys($scope.toastPosition)
      .filter(function(pos) { return $scope.toastPosition[pos]; })
      .join(' ');
  };

  function sanitizePosition() {
    var current = $scope.toastPosition;

    if ( current.bottom && last.top ) current.top = false;
    if ( current.top && last.bottom ) current.bottom = false;
    if ( current.right && last.left ) current.left = false;
    if ( current.left && last.right ) current.right = false;

    last = angular.extend({},current);
  }

  $scope.showSimpleToast = function() {
    var pinTo = $scope.getToastPosition();

    $mdToast.show(
      $mdToast.simple()
        .textContent('Bạn đã cập nhật thành công!')
        .position(pinTo )
        .hideDelay(2000)
    );
  };
  

	
	
});

app.controller('ToastCtrl', function($scope, $mdToast) {
  $scope.closeToast = function() {
    $mdToast.hide();
  };
});

//thêm xóa sửa danh mục
app.controller('controller3', function ($scope,$http) {
	$http.get("http://localhost/006/product/getdanhmuc").then(function(res){
		$scope.danhmucsp=res.data;
	});
	$scope.suadanhmucsp=function (motdanhmuc) {
		motdanhmuc.hienthi=!motdanhmuc.hienthi;

	};
	//sửa danh mục
	$scope.luudanhmucsp=function (motdanhmuc) {
		motdanhmuc.hienthi=!motdanhmuc.hienthi;
		var data=$.param({
			id:motdanhmuc.id,
			name:motdanhmuc.name
		});
		var config ={
			headers:{
				'content-type':'application/x-www-form-urlencoded;charset=UTF-8'
			}
		}
		$http.post('http://localhost/006/product/savedanhmucsp', data, config).then(function (res) {
			if (res.data='thanhcong') {}
			console.log(res.data);
		}, 
		function (res) {
			console.log(res.data);
		});
	};
	//xóa danh mục sp
	$scope.xoadanhmucsp=function (motdanhmuc) {
		motdanhmuc.an=true;
		var data=$.param({
			id:motdanhmuc.id,
			name:motdanhmuc.name
		});
		var config ={
			headers:{
				'content-type':'application/x-www-form-urlencoded;charset=UTF-8'
			}
		}
		$http.post('http://localhost/006/product/deletedanhmucsp', data, config).then(function (res) {
			if (res.data='thanhcong') {}
			console.log(res.data);
		}, 
		function (res) {
			console.log(res.data);
		});

	};



});
