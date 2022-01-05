var app = angular.module('myApp', ['ngMaterial']);
app.controller('controller2', function ($scope,$http) {
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
			email:mottk.email
		});
		var config ={
			headers:{
				'content-type':'application/x-www-form-urlencoded;charset=UTF-8'
			}
		}
		$http.post('http://localhost/006/admin/luuthaydoiadmin', data, config).then(function (res) {
			if (res.data='thanhcong') {}
			console.log(res.data);
		}, 
		function (res) {
			console.log(res.data);
		});
	}
	
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

//thêm xóa sửa món ăn
app.controller('controller4', function ($scope,$http) {
	$http.get("http://localhost/006/product/getmonan").then(function(res){
		$scope.monan=res.data;
	});
	
});
//get chi tiet don
app.controller('controller5', function ($scope,$http) {
	$scope.xemchitiet=function () {
		var id=$scope.id;
		//console.log(id);
    $http.get("http://localhost/006/user_authentication/xemchitietdon/"+id).then(function(res){
		console.log(res.data);
		$scope.donchitiet=res.data;
	});

	};
	
	
});
app.controller('controller6', function ($scope,$http) {
	$scope.thaydoithongtin=function() {
		$scope.hienthi=false;
	//console.log('dakich');
	}
	
	
});
app.controller('controller7', function ($scope,$http) {
	$scope.xemchitiet=function () {
		var id=$scope.id;
		console.log(id);
    $http.get("http://localhost/006/user_authentication/xemchitietdon/"+id).then(function(res){
		console.log(res.data);
		$scope.donchitiet=res.data;
	});

	};
	
	
});




