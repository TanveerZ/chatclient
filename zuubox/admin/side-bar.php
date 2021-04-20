<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <h4><i class="fa fa-user"></i> <?php echo isset($_SESSION['css_admin']['fname']) ? $_SESSION['css_admin']['fname'] : "Admin"; ?></h3>
            </li>

            <li class="active"> <a href="manage-logo.php" title="Manage Site Logo"><i class="fa fa-home fa-fw"></i>&nbsp; Manage Site Logo</a> </li>
            <li class="active"> <a href="manage-back.php" title="Manage Site Background"><i class="fa fa-home fa-fw"></i>&nbsp; Manage Site Background</a> </li>
            
            <li> <a href="#"><i class="fa fa-user fa-fw"></i> Manage Cell<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="manage-cell.php"><i class="fa fa-th-list"></i> Cell List</a> </li>
                    <li> <a href="add-cell.php"><i class="fa fa-user"></i> Add Cell</a> </li>
                </ul>
            </li> 

            <li> <a href="#"><i class="fa fa-user fa-fw"></i> Manage Places<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="manage-place.php"><i class="fa fa-th-list"></i> Places List</a> </li>
                    <li> <a href="add-place.php"><i class="fa fa-user"></i> Add Place</a> </li>
                </ul>
            </li> 

            <li> <a href="#"><i class="fa fa-user fa-fw"></i> Manage Country & City<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="view-countrylist.php"><i class="fa fa-th-list"></i> Country List</a> </li>
                    <li> <a href="add-city.php"><i class="fa fa-user"></i>Add City </a> </li>
                </ul>
            </li>   



            <li> <a href="#"><i class="fa fa-user fa-fw"></i> Manage Cell's Details<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="view_section1.php"><i class="fa fa-th-list"></i> Section 1</a> </li>
                    <li> <a href="view_section2.php"><i class="fa fa-th-list"></i> Section 2</a> </li>
                    <li> <a href="view_section3.php"><i class="fa fa-th-list"></i> Section 3</a> </li>
                    <li> <a href="view_cellslider.php"><i class="fa fa-th-list"></i> Cell Slider</a> 
                    </li>                    
                </ul>
            </li>

             <li class="active"> <a href="manage-user.php" title="Manage user"><i class="fa fa-home fa-fw"></i>&nbsp; Manage User's</a> </li>                    

            <li> <a href="#"><i class="fa fa-user fa-fw"></i> Manage Abouts<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li><a href="manage-about-logo.php"><i class="fa fa-th-list"></i>Manage Logo</a></li>
                    <li><a href="manage-about.php"><i class="fa fa-th-list"></i>Manage aboutus Content</a></li>
                    <li> <a href="manage-menu.php"><i class="fa fa-th-list"></i>Manage Menu List</a> 
                    </li>
                    <li> <a href="view_artical.php"><i class="fa fa-th-list"></i> Manage Artical's</a> 
                    </li>

                    <li> <a href="view_subscribepost.php"><i class="fa fa-th-list"></i>Manage Subscriber Post </a> 
                    </li>
                    <li><a href="view_aboutevent.php"><i class="fa fa-th-list"></i>Manage Event</a></li>
                  
                    <li><a href="view_videolist.php"><i class="fa fa-th-list"></i>Manage Video</a></li>
                  
                </ul>
            </li>
                <li><a href="view_avitor.php"><i class="fa fa-th-list"></i>Manage Avitor</a></li>

                 <li><a href="view_slidervideo.php"><i class="fa fa-th-list"></i>Manage Slider video</a></li>
                <li><a href="view_usercell.php"><i class="fa fa-th-list"></i>Manage User Cell</a></li>
            
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
