<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
   <div class="slimscroll-menu">
      <!--- Sidemenu -->
      <div id="sidebar-menu">
         <ul class="metismenu" id="side-menu">
            <li class="menu-title">Navigation</li>
            <li>
               <a href="{{route('dashboardHome')}}">
               <i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span>
               </a>
            </li>
            <li>
               <a href="javascript: void(0);"><i class="mdi mdi-book-open-variant"></i> <span> Page </span> <span class="menu-arrow"></span></a>
               <ul class="nav-second-level" aria-expanded="false">
                  <li>
                     <a href="{{route('add-page')}}">
                     <i class=" icon-plus"></i> <span> Add pages </span>
                     </a>
                  </li>
                  <li>
                     <a href="{{route('all-pages')}}">
                     <i class="mdi mdi-view-dashboard"></i> <span> All pages </span>
                     </a>
                  </li>
                  <li>
                     <a href="{{route('add-principle')}}">
                     <i class=" icon-plus"></i> <span> Add principle page </span>
                     </a>
                  </li>
                  <li>
                     <a href="{{route('all-principle')}}">
                     <i class="mdi mdi-view-dashboard"></i> <span> All principle </span>
                     </a>
                  </li>
               </ul>
            </li>
            <li>
               <a href="javascript: void(0);"><i class=" mdi mdi-account-group"></i> <span> Team </span> <span class="menu-arrow"></span></a>
               <ul class="nav-second-level" aria-expanded="false">
                  <li>
                     <a href="{{route('add-team')}}">
                     <i class=" icon-plus"></i> <span> Add team </span>
                     </a>
                  </li>
                  {{--        
                  <li>
                     <a href="{{route('add-principle')}}">
                     <i class="mdi mdi-view-dashboard"></i> <span> Add principle page </span>
                     </a>
                  </li>
                  --}}
                  <li>
                     <a href="{{route('all-teams')}}">
                     <i class="mdi mdi-view-dashboard"></i> <span> All teams </span>
                     </a>
                  </li>
                  {{--       
                  <li>
                     <a href="{{route('all-principle')}}">
                     <i class="mdi mdi-view-dashboard"></i> <span> All principle </span>
                     </a>
                  </li>
                  --}}
               </ul>
            </li>
            <li>
               <a href="javascript: void(0);"><i class="mdi mdi-account-multiple-outline"></i> <span> Client </span> <span class="menu-arrow"></span></a>
               <ul class="nav-second-level" aria-expanded="false">
                  <li>
                     <a href="{{route('add-client')}}">
                     <i class=" icon-plus"></i> <span> Add client </span>
                     </a>
                  </li>
                  {{--        
                  <li>
                     <a href="{{route('add-principle')}}">
                     <i class="mdi mdi-view-dashboard"></i> <span> Add principle page </span>
                     </a>
                  </li>
                  --}}
                  <li>
                     <a href="{{route('all-clients')}}">
                     <i class="mdi mdi-view-dashboard"></i> <span> All clients </span>
                     </a>
                  </li>
               </ul>
            </li>
            <li>
               <a href="javascript: void(0);"><i class=" icon-layers"></i> <span> Career </span> <span class="menu-arrow"></span></a>
               <ul class="nav-second-level" aria-expanded="false">
                  <li>
                     <a href="{{route('add-career')}}">
                     <i class=" icon-plus"></i> <span> Add career </span>
                     </a>
                  </li>
                  {{--        
                  <li>
                     <a href="{{route('add-principle')}}">
                     <i class="mdi mdi-view-dashboard"></i> <span> Add principle page </span>
                     </a>
                  </li>
                  --}}
                  <li>
                     <a href="{{route('all-careers')}}">
                     <i class="mdi mdi-view-dashboard"></i> <span> All careers </span>
                     </a>
                  </li>
                  <li>
                     <a href="{{route('all-appliers')}}">
                     <i class="mdi mdi-view-dashboard"></i> <span> All appliers </span>
                     </a>
                  </li>
               </ul>
            </li>
            <li>
               <a href="javascript: void(0);"><i class=" mdi mdi-chart-bar"></i> <span> Work </span> <span class="menu-arrow"></span></a>
               <ul class="nav-second-level" aria-expanded="false">
                  <li>
                     <a href="{{route('add-work')}}">
                     <i class=" icon-plus"></i> <span> Add work </span>
                     </a>
                  </li>
                  {{--        
                  <li>
                     <a href="{{route('add-principle')}}">
                     <i class="mdi mdi-view-dashboard"></i> <span> Add principle page </span>
                     </a>
                  </li>
                  --}}
                  <li>
                     <a href="{{route('all-works')}}">
                     <i class="mdi mdi-view-dashboard"></i> <span> All works </span>
                     </a>
                  </li>
                  <li>
                     <a href="{{route('add-workfile')}}">
                     <i class=" icon-plus"></i> <span> Add work file </span>
                     </a>
                  </li>
                  <li>
                     <a href="{{route('all-workfiles')}}">
                     <i class="mdi mdi-view-dashboard"></i> <span> All work files </span>
                     </a>
                  </li>
                  <li>
                     <a href="{{route('add-workfileimg')}}">
                     <i class=" icon-plus"></i> <span> Add work file Iteam</span>
                     </a>
                  </li>
                  <li>
                     <a href="{{route('all-workfileimgs')}}">
                     <i class="mdi mdi-view-dashboard"></i> <span> All work file Iteams</span>
                     </a>
                  </li>
                  <li>
                     <a href="{{route('add-workfiletype')}}">
                     <i class=" icon-plus"></i> <span> Add work file Type</span>
                     </a>
                  </li> 
                  <li>
                     <a href="{{route('all-workfiletypes')}}">
                     <i class="mdi mdi-view-dashboard"></i> <span> All work file Types</span>
                     </a>
                  </li>
               </ul>
            </li>
            <li>
               <a href="javascript: void(0);"><i class=" mdi mdi-account-star"></i> <span> Admin </span> <span class="menu-arrow"></span></a>
               <ul class="nav-second-level" aria-expanded="false">
                  <li>
                     <a href="{{route('add-admin')}}">
                     <i class=" icon-plus"></i> <span> Add admin </span>
                     </a>
                  </li>
                  {{--        
                  <li>
                     <a href="{{route('add-principle')}}">
                     <i class="mdi mdi-view-dashboard"></i> <span> Add principle page </span>
                     </a>
                  </li>
                  --}}
                  <li>
                     <a href="{{route('all-admins')}}">
                     <i class="mdi mdi-view-dashboard"></i> <span> All admins </span>
                     </a>
                  </li>
               </ul>
            </li>
            <li>
               <a href="javascript: void(0);"><i class=" dripicons-gear noti-icon"></i> <span> Settings </span> <span class="menu-arrow"></span></a>
               <ul class="nav-second-level" aria-expanded="false">
                  <li>
                     <a href="{{route('slider')}}">
                     <i class="mdi mdi-view-dashboard"></i> <span> Slider settings </span>
                     </a>
                  </li>
                  <li>
                     <a href="{{route('add-address')}}">
                     <i class="mdi mdi-view-dashboard"></i> <span> Address map settings </span>
                     </a>
                  </li>
               </ul>
            </li>
         </ul>
      </div>
      <!-- Sidebar -->
      <div class="clearfix"></div>
   </div>
   <!-- Sidebar -left -->
</div>
<!-- Left Sidebar End -->
</div>
<!-- End #wrapper -->