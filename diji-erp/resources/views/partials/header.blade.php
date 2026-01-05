  <header class="app-topbar">
            <div class="container-fluid topbar-menu">
                <div class="d-flex align-items-center gap-2">
                    <div class="logo-topbar">
                        <a href="index.html" class="logo-light">
                            <span class="logo-lg">
                                <img src="assets/images/logo.png" alt="logo" />
                            </span>
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.png" alt="small logo" />
                            </span>
                        </a>
                        <a href="index.html" class="logo-dark">
                            <span class="logo-lg">
                                <img src="assets/images/logo-black.png" alt="dark logo" />
                            </span>
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.png" alt="small logo" />
                            </span>
                        </a>
                    </div>
                    <button class="sidenav-toggle-button btn btn-primary btn-icon">
                        <i class="ri ri-menu-line"></i>
                    </button>
                    <button class="topnav-toggle-button px-2" data-bs-toggle="collapse" data-bs-target="#topnav-menu">
                        <i class="ri ri-menu-line"></i>
                    </button>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <div id="theme-toggler" class="topbar-item d-none d-sm-flex">
                        <button class="topbar-link" id="light-dark-mode" type="button">
                            <i class="ri ri-moon-line topbar-link-icon mode-light-moon"></i>
                            <i class="ri ri-sun-line topbar-link-icon mode-light-sun"></i>
                        </button>
                    </div>

                    <div id="language-selector-rounded" class="topbar-item">
                        <div class="dropdown">
                            <button class="topbar-link fw-bold" data-bs-toggle="dropdown" type="button" aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/flags/us.svg" alt="user-image" class="rounded-circle me-2" height="18" id="selected-language-image" />
                                <span id="selected-language-code">EN</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:void(0);" class="dropdown-item" data-translator-lang="en" title="English">
                                    <img src="assets/images/flags/us.svg" alt="English" class="me-1 rounded-circle" height="18" data-translator-image="" />
                                    <span class="align-middle">İngilizce</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item" data-translator-lang="de" title="German">
                                    <img src="assets/images/flags/de.svg" alt="German" class="me-1 rounded-circle" height="18" data-translator-image="" />
                                    <span class="align-middle">Türkçe</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div id="notification-dropdown-people" class="topbar-item">
                        <div class="dropdown">
                            <button class="topbar-link dropdown-toggle drop-arrow-none" data-bs-toggle="dropdown" type="button" data-bs-auto-close="outside" aria-haspopup="false" aria-expanded="false">
                                <i class="ri ri-notification-3-line topbar-link-icon animate-ring"></i>
                                <span class="badge text-bg-danger badge-circle topbar-badge">5</span>
                            </button>

                            <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg">
                                <div class="px-3 py-2 border-bottom">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0 fs-md fw-semibold">Bildirimler</h6>
                                        </div>
                                        <div class="col text-end">
                                            <a href="#!" class="badge badge-soft-success badge-label py-1">07 Bildiri</a>
                                        </div>
                                    </div>
                                </div>

                                <div style="max-height: 300px" data-simplebar="">
                                    <div class="dropdown-item notification-item py-2 text-wrap" id="message-1">
                                        <span class="d-flex align-items-center gap-3">
                                            <span class="flex-shrink-0 position-relative">
                                                <img src="assets/images/users/user-4.jpg" class="avatar-md rounded-circle" alt="User Avatar" />
                                                <span class="position-absolute rounded-pill bg-success notification-badge">
                                                    <i class="ri ri-notification-3-line align-middle"></i>
                                                    <span class="visually-hidden">unread notification</span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1 text-muted">
                                                <span class="fw-medium text-body">Emily Johnson</span>
                                                commented on a task in
                                                <span class="fw-medium text-body">Design Sprint</span>
                                                <br />
                                                <span class="fs-xs">12 minutes ago</span>
                                            </span>
                                            <button type="button" class="flex-shrink-0 text-muted btn btn-link p-0 position-absolute end-0 me-2 d-none noti-close-btn" data-dismissible="#message-1">
                                                <i class="ri ri-close-circle-line fs-xxl"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="dropdown-item text-center text-reset text-decoration-underline link-offset-2 fw-bold notify-item border-top border-light py-2">Tüm Bildirimleri Göster</a>
                            </div>
                        </div>
                    </div>

                    <div id="fullscreen-toggler" class="topbar-item d-none d-sm-flex">
                        <button class="topbar-link" type="button" data-toggle="fullscreen">
                            <i class="ri ri-fullscreen-line topbar-link-icon"></i>
                            <i class="ri ri-fullscreen-exit-line topbar-link-icon d-none"></i>
                        </button>
                    </div>

                    <div id="simple-user-dropdown" class="topbar-item nav-user">
                        <div class="dropdown">
                            <a class="topbar-link dropdown-toggle drop-arrow-none px-2" data-bs-toggle="dropdown" href="#!" aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/users/user-1.jpg" width="32" class="rounded-circle me-lg-2 d-flex" alt="user-image" />
                                <div class="d-lg-flex align-items-center gap-1 d-none">
                                    <h5 class="my-0">Selimcan Gürsu</h5>
                                    <i class="ri ri-arrow-down-s-line align-middle"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome back!</h6>
                                </div>
                                <a href="#!" class="dropdown-item">
                                    <i class="ri ri-user-line me-1 fs-lg align-middle"></i>
                                    <span class="align-middle">Profilim</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="ri ri-notification-3-line me-1 fs-lg align-middle"></i>
                                    <span class="align-middle">Bildirimler</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="ri ri-customer-service-line me-1 fs-lg align-middle"></i>
                                    <span class="align-middle">Teknik Destek</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:void(0);" class="dropdown-item text-danger fw-semibold">
                                    <i class="ri ri-logout-box-line me-1 fs-lg align-middle"></i>
                                    <span class="align-middle">Güvenli Çıkış</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
