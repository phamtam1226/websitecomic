@extends('user.layout')
@section('content')


<div id="content-wrapper" class="ng-scope">



	<div class="row" id="content-header">
		<div class="col-lg-12">
			<div class="pull-left">
				<h1 ng-bind="$root.title" class="ng-binding">Tổng quan</h1>
			</div>
			<div class="pull-right">


			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="main-box">
					<div class="clearfix">
						<div class="infographic-box merged merged-top pull-left has-pointer" ng-click="$root.goTo($root.menuUrl.order)">
							<i class="fa fa-tags emerald-bg"></i>
							<span class="value emerald ng-binding">0</span>
							<span class="headline ng-binding">ĐƠN HÀNG</span>
						</div>
						<div class="infographic-box merged merged-top merged-right pull-left has-pointer" ng-click="$root.goTo($root.menuUrl.order)">
							<i class="fa fa-cart-arrow-down emerald-bg"></i>
							<span class="value emerald ng-binding">0</span>
							<span class="headline ng-binding">DOANH THU</span>
						</div>
					</div>
					<div class="clearfix" ng-show="$root.IsRestaurant">
						<div class="infographic-box merged pull-left has-pointer" ng-click="$root.goTo($root.menuUrl.roomhistory)">
							<i class="fa fa-reply emerald-bg"></i>
							<span class="value emerald ng-binding">0</span>
							<span class="headline ng-binding">HỦY/TRẢ ĐỒ</span>
						</div>

						<div class="infographic-box merged merged-right pull-left has-pointer" ng-click="$root.goTo($root.menuUrl.roomhistory)">
							<i class="fa fa-reply-all emerald-bg"></i>
							<span class="value emerald ng-binding">0</span>
							<span class="headline ng-binding">GIÁ TRỊ TRẢ LẠI</span>
						</div>
					</div>

				</div>
			</div>
			<div class="col-md-6">
				<div class="main-box">
					<div class="clearfix">
						<div class="infographic-box merged merged-top pull-left has-pointer" ng-click="$root.goTo($root.menuUrl.cashflow)">
							<i class="fa fa-money emerald-bg"></i>
							<span class="value emerald ng-binding">0</span>
							<span class="headline ng-binding">TIỀN MẶT</span>
						</div>
						<div class="infographic-box merged merged-top merged-right pull-left has-pointer" ng-click="$root.goTo($root.menuUrl.cashflow)">
							<i class="fa fa-cc-visa emerald-bg"></i>
							<span class="value emerald ng-binding">0</span>
							<span class="headline ng-binding">Tài khoản khác</span>
						</div>
					</div>
					<div class="clearfix">
						<div class="infographic-box merged pull-left has-pointer" ng-click="$root.goTo($root.menuUrl.customer)">
							<i class="fa fa-address-card emerald-bg"></i>
							<span class="value emerald ng-binding">0</span>
							<span class="headline ng-binding">Ghi nợ</span>
						</div>

						<div class="infographic-box merged merged-right pull-left has-pointer" ng-show="$root.IsRestaurant" ng-click="$root.goTo($root.menuUrl.room)">
							<i class="fa fa-crosshairs emerald-bg"></i>
							<span class="value emerald ng-binding">0 / 30</span>
							<span class="headline ng-binding">BÀN SỬ DỤNG</span>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-9">
			<div class="row">
				<div class="col-lg-12">
					<div class="main-box">
						<header class="main-box-header clearfix dashboard">
							<h2 class="pull-left ng-binding">Doanh thu trong 7 ngày trước</h2>
							<div class="pull-right">


								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">7 ngày trước</a>
									<ul class="dropdown-menu">
										<li><a class="dropdown-item" href="#">Link</a></li>
										<li><a class="dropdown-item" href="#">Another link</a></li>
										<li><a class="dropdown-item" href="#">A third link</a></li>
									</ul>
								</li>
							</div>
						</header>
						<div class="main-box-body clearfix">
							<div kendo-chart="chartRevenueForDays" k-options="chartRevenueForDaysOptions" style="height: 300px; position: relative;" data-role="chart" class=" k-chart"><svg style="width: 100%; height: 100%; overflow: hidden; left: -0.0666675px; top: -0.950012px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1">
									<defs></defs>
									<g>
										<path d="M0 0 L 881 0 881 300 0 300Z" stroke="none" fill="#fff"></path>
										<path d="M21 5 L 875 5 875 286 21 286Z" stroke="none" fill="#fff" fill-opacity="0"></path>
										<g>
											<g></g>
											<g>
												<path d="M21.5 5.5 L 875.5 5.5" stroke="#c7c7c7" stroke-width="1" fill="none"></path>
											</g>
											<g>
												<g>
													<g>
														<path d="M21.5 286.5 L 875.5 286.5" stroke="#c7c7c7" stroke-width="1" fill="none"></path>
														<path d="M21.5 286.5 L 21.5 290.5" stroke="#c7c7c7" stroke-width="1" fill="none"></path>
													</g>
												</g>
											</g>
											<g>
												<g>
													<path d="M21.5 5.5 L 21.5 286.5" stroke="#c7c7c7" stroke-width="1" fill="none"></path>
													<path d="M17.5 286.5 L 21.5 286.5" stroke="#c7c7c7" stroke-width="1" fill="none"></path>
													<path d="M17.5 5.5 L 21.5 5.5" stroke="#c7c7c7" stroke-width="1" fill="none"></path>
												</g>
											</g>
											<g><text style="font:12px Arial, Helvetica, sans-serif;white-space:pre;" x="5" y="290" stroke="none" fill="#777777" fill-opacity="1">0</text></g>
										</g>
										<g></g>
									</g>
								</svg></div>
							<div class="total-dashboard"><i class="fa fa-caret-right"></i> <span id="totalRevenue">0</span></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="main-box">
						<header class="main-box-header clearfix dashboard">
							<h2 class="pull-left ng-binding">Hàng bán chạy</h2>
							<div class="pull-right">
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">7 ngày trước</a>
									<ul class="dropdown-menu">
										<li><a class="dropdown-item" href="#">Link</a></li>
										<li><a class="dropdown-item" href="#">Another link</a></li>
										<li><a class="dropdown-item" href="#">A third link</a></li>
									</ul>
								</li>
							</div>
						</header>
						<div class="main-box-body clearfix">
							<div class="table-responsive" style="min-height: 315px;">
								<table class="table table-striped table-hover" style="margin-bottom:0px;">

									<tbody>
										<!-- ngRepeat: product in PopularProducts -->
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="main-box">
						<header class="main-box-header clearfix dashboard">
							<h2 class="pull-left ng-binding">Doanh thu theo chi nhánh</h2>
							<div class="pull-right">
								<i class="fa fa-pie-chart has-pointer red" aria-hidden="true" ng-click="changeRevenueByBranchType('pie')"></i>
								<i class="fa fa-bar-chart has-pointer " aria-hidden="true" ng-click="changeRevenueByBranchType('bar')"></i>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">7 ngày trước</a>
									<ul class="dropdown-menu">
										<li><a class="dropdown-item" href="#">Link</a></li>
										<li><a class="dropdown-item" href="#">Another link</a></li>
										<li><a class="dropdown-item" href="#">A third link</a></li>
									</ul>
								</li>
							</div>
						</header>
						<div class="main-box-body clearfix">
							<div kendo-chart="chartRevenueByBranch" k-options="chartRevenueByBranchOptions" style="height: 300px; position: relative;" data-role="chart" class=" k-chart"><svg style="width: 100%; height: 100%; overflow: hidden; left: -0.616699px; top: -0.466675px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1">
									<defs></defs>
									<g>
										<path d="M0 0 L 575 0 575 300 0 300Z" stroke="none" fill="none"></path>
										<path d="M0 0 L 0 0 0 0 0 0Z" stroke="none" fill="#fff" fill-opacity="0"></path>
										<g>
											<g></g>
										</g>
										<g>
											<g></g>
										</g>
									</g>
								</svg></div>
							<div class="total-dashboard"><i class="fa fa-caret-right"></i> <span id="totalRevenueByBranch">0</span></div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="col-md-3">

                    <div class="main-box">
                        <div class="main-box-body clearfix" style="padding:5px 10px 5px 15px;cursor:pointer">
                            <h2 class="pull-left" style="padding-top:5px;">
                                HOTLINE : <a href="tel:19004515" style="text-decoration: none;">
                                    <strong style="color:#dd191d" class="ng-binding">1900 4515</strong>
                                </a>
                            </h2>
                            <div class="pull-right">
                                <i class="fa fa-phone-square themecolor" style="font-size:2em"></i>
                            </div>
                        </div>
                    </div>
                    <!--<div class="main-box" ng-show="$root.domainwww != 'www.posio.vn'">
                        <div class="main-box-body clearfix" style="padding:5px 10px 5px 15px;cursor:pointer" ng-click="$root.goTo($root.menuUrl.karavan)">
                            <div class="col-lg-12"><img src="https://about.karavan.vn/wp-content/uploads/pos365/dashboard-banner.png" style="width:100%" /></div>
                        </div>
                    </div>-->
                   
                    <div class="main-box">
                        <div class="main-box-body clearfix" style="padding:5px 10px 5px 15px;cursor:pointer">
                            <h2 class="pull-left ng-binding" style="padding-top:5px;">Lịch đặt Phòng/Bàn</h2>
                            <div class="pull-right">
                                <i class="fa fa-calendar themecolor" style="font-size:2em"></i>
                            </div>
                        </div>
                    </div>
                    <div class="main-box">
                        <div class="main-box-body clearfix" style="padding:5px 10px 5px 15px;cursor:pointer" ng-click="$root.goTo($root.menuUrl.sms)">
                            <h2 class="pull-left ng-binding" style="padding-top:5px;">Gửi tin SMS</h2>
                            <div class="pull-right">
                                <i class="fa fa-envelope themecolor" style="font-size:2em"></i>
                            </div>
                        </div>
                    </div>

                    <!--Next-->
                    <div class="main-box">
                        <header class="main-box-header clearfix">
                            <h2 class="pull-left ng-binding">Hoạt động gần đây</h2>
                        </header>
                        <div class="main-box-body clearfix feed">
                            <ul>
                                <!-- ngRepeat: item in activities -->

                            </ul>
                        </div>
                    </div>
                </div>

	</div>
</div>
@stop