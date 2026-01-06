 <div class="sidenav-menu">
     <a href="index.html" class="logo">
         <span class="logo logo-light">
             <span class="logo-lg"><img src="assets/images/logo.png" alt="logo" /></span>
             <span class="logo-sm"><img src="assets/images/logo-sm.png" alt="small logo" /></span>
         </span>
         <span class="logo logo-dark">
             <span class="logo-lg"><img src="assets/images/logo-black.png" alt="dark logo" /></span>
             <span class="logo-sm"><img src="assets/images/logo-sm.png" alt="small logo" /></span>
         </span>
     </a>
     <button class="button-close-offcanvas">
         <i class="ri ri-menu-line align-middle"></i>
     </button>
     <div class="scrollbar" data-simplebar="">
         <div id="sidenav-menu">
             <ul class="side-nav">
                 <li class="side-nav-title mt-2" data-lang="main">MODÜLLER</li>
                 <li class="side-nav-item">
                     <a href="index.html" class="side-nav-link">
                         <span class="menu-icon"><i class="ri ri-dashboard-2-line"></i></span>
                         <span class="menu-text" data-lang="index">Kontrol Paneli</span>
                     </a>
                 </li>
                 <li class="side-nav-item">
                     <a data-bs-toggle="collapse" href="#pages" aria-expanded="false" aria-controls="pages"
                         class="side-nav-link">
                         <i class="ri ri-team-line"></i>
                         <span class="menu-text" data-lang="pages">İnsan Kaynakları</span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="pages">
                         <ul class="sub-menu">
                             <li class="side-nav-item">
                                 <a href="{{route('employee-management.index')}}" class="side-nav-link">
                                     <span class="menu-text" data-lang="pages-faq">Personel Yönetimi</span>
                                 </a>
                             </li>
                             <li class="side-nav-item">
                                 <a href="pages-faq.html" class="side-nav-link">
                                     <span class="menu-text" data-lang="pages-faq">Çalışan Zaman Takibi</span>
                                 </a>
                             </li>
                             <li class="side-nav-item">
                                 <a href="{{route('leave-program.index')}}" class="side-nav-link">
                                     <span class="menu-text" data-lang="pages-faq">İzin Çizelgesi</span>
                                 </a>
                             </li>
                             <li class="side-nav-item">
                                 <a href="pages-faq.html" class="side-nav-link">
                                     <span class="menu-text" data-lang="pages-faq">Oturum Geçmişi</span>
                                 </a>
                             </li>
                             <li class="side-nav-item">
                                 <a href="pages-faq.html" class="side-nav-link">
                                     <span class="menu-text" data-lang="pages-faq">İşe Alım ve Aday Takip</span>
                                 </a>
                             </li>
                             <li class="side-nav-item">
                                 <a href="pages-faq.html" class="side-nav-link">
                                     <span class="menu-text" data-lang="pages-faq">Bordro ve Finansal İşlemler</span>
                                 </a>
                             </li>
                             <li class="side-nav-item">
                                 <a href="pages-faq.html" class="side-nav-link">
                                     <span class="menu-text" data-lang="pages-faq">Eğitim ve Gelişim (LMS)</span>
                                 </a>
                             </li>
                             <li class="side-nav-item">
                                 <a href="pages-faq.html" class="side-nav-link">
                                     <span class="menu-text" data-lang="pages-faq">Zimmet Yönetimi</span>
                                 </a>
                             </li>

                         </ul>
                     </div>
                 </li>
             </ul>
         </div>
     </div>
 </div>
