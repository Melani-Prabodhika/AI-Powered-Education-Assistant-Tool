<?php
function formatUrlPath($string)
{
    if (strpos($string, ' ') !== false) {
        return $string;
    }

    return str_replace('_', ' ', $string);
}
?>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="enable" data-theme="default" data-theme-colors="default" data-bs-theme="light">

<head>

    <meta charset="utf-8" />
    <title>EduGenesis</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Invigo v2 by Introps IT" name="description" />
    <meta content="Introps IT" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/system/icon2.ico">
	
	 <!-- jquery library -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	
    <!-- jsvectormap css -->
    <link href="/assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="/assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />
	
	<!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
	<!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">	

    <!-- Layout config Js -->
    <script src="/assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="/assets/css/custom.min.css" rel="stylesheet" type="text/css" />
    <!-- fontawesome kit -->
    <script src="https://kit.fontawesome.com/a7c12d2dfa.js" crossorigin="anonymous"></script>
	<!--select 2-->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	
	 <!-- Filepond css -->
    <link rel="stylesheet" href="/assets/libs/filepond/filepond.min.css" type="text/css" />
    <link rel="stylesheet" href="/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css">
	
	<!--custom-->
	<link href="/assets/custom/custom.css" rel="stylesheet">
	
	<script>
		let DataTablesForAjax = [];
		$(document).ready(function(){
			DataTablesForAjax = $('.mydatatable').DataTable({
				pageLength: 25,
				dom: "lBfrtip",
				buttons: ["copy", "csv", "excel", "print", "pdf"]
			});
		})
	</script>
</head>

<style>

.app-search .form-control {
	padding-left: 15px !important;
}

.dataTables_length {
	display: none;
}

button.dt-button, div.dt-button, a.dt-button, input.dt-button {
  margin-left: 0em !important;
  margin-right: 0em !important;
}

.dt-buttons :is(button.dt-button, div.dt-button, a.dt-button, input.dt-button) {
  background: #fff !important;
}

button.dt-button:hover:not(.disabled) {
	background: #f6f8fadb !important;
}

.dt-buttons:is(button, div, a, input):is(.dt-button.active:not(.disabled):hover:not(.disabled)), :is(button, div, a, input):is(.dt-button:active:not(.disabled):hover:not(.disabled)) {
  background: #f6f8fadb !important;
}

table.dataTable td.dataTables_empty {
	padding: .75rem .6rem !important;
}

.table > thead {
	background-color: rgba(var(--vz-light-rgb), .75) !important;
}

.page-title-box {
  background-color: #405189;
}

.page-title-box h4 {
	color: #ffffff;
}

</style>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="/Dashboard" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="/assets/images/edugenesis-logo.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                   <img src="/assets/images/edugenesis-logo.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="/Dashboard" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="/assets/images/edugenesis-logo.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="/assets/images/edugenesis-logo.png" alt="" height="17">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger material-shadow-none" id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                        <form class="app-search d-none d-md-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search..." autocomplete="off" id="search-options" value="">
                               <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                            </div>
                            <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                                <div data-simplebar style="max-height: 320px;">
                                    <div class="dropdown-header">
                                        <h6 class="text-overflow text-muted mb-0 text-uppercase">Recent Searches</h6>
                                    </div>

                                    <div class="dropdown-item bg-transparent text-wrap">
                                        <a href="index.html" class="btn btn-soft-secondary btn-sm rounded-pill">how to setup <i class="mdi mdi-magnify ms-1"></i></a>
                                        <a href="index.html" class="btn btn-soft-secondary btn-sm rounded-pill">buttons <i class="mdi mdi-magnify ms-1"></i></a>
                                    </div>
                                    <!-- item-->
                                    <div class="dropdown-header mt-2">
                                        <h6 class="text-overflow text-muted mb-1 text-uppercase">Pages</h6>
                                    </div>

                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>
                                        <span>Analytics Dashboard</span>
                                    </a>

                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>
                                        <span>Help Center</span>
                                    </a>

                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>
                                        <span>My account settings</span>
                                    </a>

                                    <div class="dropdown-header mt-2">
                                        <h6 class="text-overflow text-muted mb-2 text-uppercase">Members</h6>
                                    </div>

                                    <div class="notification-list">
                                        <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                            <div class="d-flex">
                                                <img src="/assets/images/users/avatar-2.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                <div class="flex-grow-1">
                                                    <h6 class="m-0">Angela Bernier</h6>
                                                    <span class="fs-11 mb-0 text-muted">Manager</span>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                            <div class="d-flex">
                                                <img src="/assets/images/users/avatar-3.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                <div class="flex-grow-1">
                                                    <h6 class="m-0">David Grasso</h6>
                                                    <span class="fs-11 mb-0 text-muted">Web Designer</span>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                            <div class="d-flex">
                                                <img src="/assets/images/users/avatar-5.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                <div class="flex-grow-1">
                                                    <h6 class="m-0">Mike Bunch</h6>
                                                    <span class="fs-11 mb-0 text-muted">React Developer</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="text-center pt-3 pb-1">
                                    <a href="pages-search-results.html" class="btn btn-primary btn-sm">View All Results <i class="ri-arrow-right-line ms-1"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex align-items-center">

                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <button type="button" class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-search fs-22"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown topbar-head-dropdown ms-1 header-item">
                            <button type="button" class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class='bx bx-category-alt fs-22'></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg p-0 dropdown-menu-end">
                                <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0 fw-semibold fs-15"> Quick Access </h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#!" class="btn btn-sm btn-soft-info"> View All 
                                                <i class="ri-arrow-right-s-line align-middle"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2">
                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="/Activity_log">  
                                                <img src="/assets/images/brands/activity-log-icon.png" alt="activity-log-iconb">
                                                <span>Activity Log</span>
                                            </a>
                                        </div>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                                <i class='bx bx-fullscreen fs-22'></i>
                            </button>
                        </div>

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle light-dark-mode">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div>
                        <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
                            <button type="button" class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                                <i class='bx bx-bell fs-22'></i>
                                <span id="notification-count" class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">3<span class="visually-hidden">unread messages</span></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                                 <div class="dropdown-head bg-primary bg-pattern rounded-top">
                                    <div class="p-3">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-0 fs-16 fw-semibold text-white"> Notifications </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content position-relative" id="notificationItemsTabContent">
                                    <div class="tab-pane fade show active py-2 ps-2" id="all-noti-tab" role="tabpanel">
                                        <div id="notification-list" data-simplebar style="max-height: 500px;" class="pe-2">
                                                                         

                                            <div class="my-3 text-center view-all">
                                                <button type="button" class="btn btn-soft-success waves-effect waves-light">
                                                    View All Notifications <span id="remaining-notifications-count"></span> <i class="ri-arrow-right-line align-middle"></i></button>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade p-4" id="alerts-tab" role="tabpanel" aria-labelledby="alerts-tab"></div>

                                    <div class="notification-actions" id="notification-actions">
                                        <div class="d-flex text-muted justify-content-center">
                                            Select <div id="select-content" class="text-body fw-semibold px-1">0</div> Result <button type="button" class="btn btn-link link-danger p-0 ms-3" data-bs-toggle="modal" data-bs-target="#removeNotificationModal">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user" src="/assets/images/users/user-dummy-img.jpg" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?php print_r($this->session->userdata('short_name'));?></span>
                                        <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text"><?php print_r($this->session->userdata('ut_type'));?></span>
                                    </span>
                                </span>
                            </button>
	                        <div class="dropdown-menu dropdown-menu-end">
                                <div class="d-flex justify-content-center" style="margin-bottom: 5px; color: #405189; font-weight: 500;"><?php echo ' Welcome ' . htmlspecialchars($this->session->userdata('short_name')); ?></div>
                                <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                                <a class="dropdown-item" href="/Login/logout"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="app-menu navbar-menu">
            <div class="navbar-brand-box">
                <a href="/Dashboard" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="/assets/images/edugenesis-logo.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="/assets/images/edugenesis-logo.png" alt="" height="17">
                    </span>
                </a>
                <a href="/Dashboard" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="/assets/images/edugenesis-logo.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="/assets/images/edugenesis-logo.png" alt="" height="33">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div class="dropdown sidebar-user m-1 rounded">
                <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="d-flex align-items-center gap-2">
							<?php
								if($this->session->userdata('pro_pic') == 'def_user.jpg'){
									echo '<i class="fa fa-user userImageStyles"></i>';
								}else{
									echo '<img class="rounded header-profile-user" src="/documents/users/'.$this->session->userdata('pro_pic').'" alt="Header Avatar"/>';
								}
							?>
                        <span class="text-start">
                            <span class="d-block fw-medium sidebar-user-name-text"><?= $this->session->userdata('full_name')?></span>
                            <span class="d-block fs-14 sidebar-user-name-sub-text"><i class="ri ri-circle-fill fs-10 text-success align-baseline"></i> <span class="align-middle">Online</span></span>
                        </span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <h6 class="dropdown-header">&nbsp;&nbsp; Welcome <?= $this->session->userdata('short_name')?> !</h6>
                    <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                    <a class="dropdown-item" href="apps-chat.html"><i class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Messages</span></a>
                    <a class="dropdown-item" href="apps-tasks-kanban.html"><i class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Taskboard</span></a>
                    <a class="dropdown-item" href="pages-faqs.html"><i class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Help</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Balance : <b>$5971.67</b></span></a>
                    <a class="dropdown-item" href="pages-profile-settings.html"><span class="badge bg-success-subtle text-success mt-1 float-end">New</span><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Settings</span></a>
                    <a class="dropdown-item" href="auth-lockscreen-basic.html"><i class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Lock screen</span></a>
                    <a class="dropdown-item" href="auth-logout-basic.html"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                </div>
            </div>
            <div id="scrollbar">
                <div class="container-fluid">
                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
						<?php
							$curMain = '/'.$this->uri->segment(1);
							$curSub = '/'.$this->uri->segment(2);
							$fullLink = $curMain.$curSub;
							$permissions = $this->session->userdata('permissions');
							$menu = "";
							
							foreach($permissions as $p){
								$activeClass = '';

								if($curMain == $p->pm_url){
									$activeClass = 'active';
								}
								
								if(sizeof($p->sub_permissions)-(count(array_filter($p->sub_permissions, fn($subPermission) => $subPermission->skip_menu == 1))) == 1){
									$filteredPermissions = array_values(array_filter($p->sub_permissions, function ($subPermission) {
										return $subPermission->skip_menu == 0;
									}));
																	
                           $menu .= '
                              <li class="nav-item '.$activeClass.'">
                                 <a class="nav-link menu-link" href="'.$filteredPermissions[0]->ps_url.'">
                                    <i class="'.$p->pm_icon.'"></i> <span data-key="t-'.$p->pm_id.'">'.$p->pm_name.'</span>
                                 </a>
                              </li>';

									continue;
								}else if(sizeof($p->sub_permissions)-(count(array_filter($p->sub_permissions, fn($subPermission) => $subPermission->skip_menu == 1))) < 1){
									$menu .= '
											<li class="nav-item '.$activeClass.'">
												<a class="nav-link menu-link" href="'.$p->pm_url.'">
													<i class="'.$p->pm_icon.'"></i> <span data-key="t-'.$p->pm_id.'">'.$p->pm_name.'</span>
												</a>
											</li>';
									
									continue;
								}
								
								$menu .= '
									<li class="nav-item '.$activeClass.'">
										<a class="nav-link menu-link" href="#sidebar_'.$p->pm_id.'" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebar_'.$p->pm_id.'">
											<i class="'.$p->pm_icon.'"></i> <span data-key="t-'.$p->pm_id.'">'.$p->pm_name.'</span>
										</a>
										<div class="collapse menu-dropdown '.($activeClass == 'active' ? 'show' : '').'" id="sidebar_'.$p->pm_id.'">
											<ul class="nav nav-sm flex-column" id="menu_sub_'.$p->pm_id.'">
									';
								
								foreach($p->sub_permissions as $s){
									if($s->skip_menu ==1){
										continue;
									}
									
									$activeSubClass = '';
									if($fullLink == $s->ps_url || $fullLink == $s->ps_url.'/'){
										$activeSubClass = 'active';
									}
								
									$menu .= '
										<li class="nav-item '.$activeSubClass.'">
											<a href="'.$s->ps_url.'" class="nav-link" data-key="t-'.$s->ps_id.'">'.$s->ps_name.'</a>
										</li>';
								}
								
								$menu .= '</ul></div>';
							}

							echo $menu;

						?>

                    </ul>
                </div>
            </div>

            <div class="sidebar-background"></div>
        </div>
        <div class="vertical-overlay"></div>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0"><?= formatUrlPath($this->uri->segment(1)) ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
