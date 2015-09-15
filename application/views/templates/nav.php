<!--
  Main sidebar seen on the left. may be static or collapsing depending on selected state.

    * Collapsing - navigation automatically collapse when mouse leaves it and expand when enters.
    * Static - stays always open.
-->
<nav id="sidebar" class="sidebar" role="navigation">
    <!-- need this .js class to initiate slimscroll -->
    <div class="js-sidebar-content">
        <header class="logo hidden-xs">
            <a href="../index.html"><img src="../../../dashboard-hotspot/assets/img/OptimiseHotspot.png" alt="logo" width="50" height="50"/></a>
        </header>
        <!-- seems like lots of recent admin template have this feature of user info in the sidebar.
             looks good, so adding it and enhancing with notifications -->
        <div class="sidebar-status visible-xs">
            <a href="#">
                <strong><?= $_SESSION['name']; ?></strong>
            </a>
        </div>
        <!-- main notification links are placed inside of .sidebar-nav -->
        <ul class="sidebar-nav">
            <li class="<?=($this->uri->segment(1)==='home' || $this->uri->segment(1)===null)?'active':''?>">
                <!-- an example of nested submenu. basic bootstrap collapse component -->
                <a href="<?php echo site_url('home'); ?>">
                    <span class="icon">
                        <i class="fa fa-desktop"></i>
                    </span>
                    Dashboard
                </a>
            </li>
            <li class="<?=($this->uri->segment(1)==='bezoekers')?'active':''?>">
                <a href="<?php echo site_url('bezoekers'); ?>">
                    <span class="icon">
                        <i class="fa fa-users"></i>
                    </span>
                    Bezoekers
                </a>
            </li>
            <li class="<?=($this->uri->segment(1)==='mail')?'active':''?>">
                <a href="<?php echo site_url('mail'); ?>">
                    <span class="icon">
                        <i class="fa fa-envelope"></i>
                    </span>
                    Email
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- This is the white navigation bar seen on the top. A bit enhanced BS navbar. See .page-controls in _base.scss. -->
<nav class="page-controls navbar navbar-default">
    <div class="container-fluid">
        <!-- .navbar-header contains links seen on xs & sm screens -->
        <div class="navbar-header">
            <ul class="nav navbar-nav">
                <li>
                    <!-- whether to automatically collapse sidebar on mouseleave. If activated acts more like usual admin templates -->
                    <a class="hidden-sm hidden-xs" id="nav-state-toggle" href="#" title="Turn on/off sidebar collapsing" data-placement="bottom">
                        <i class="fa fa-bars fa-lg"></i>
                    </a>
                    <!-- shown on xs & sm screen. collapses and expands navigation -->
                    <a class="visible-sm visible-xs" id="nav-collapse-toggle" href="#" title="Show/hide sidebar" data-placement="bottom">
                        <span class="rounded rounded-lg bg-gray text-white visible-xs"><i class="fa fa-bars fa-lg"></i></span>
                        <i class="fa fa-bars fa-lg hidden-xs"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right visible-xs">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="rounded rounded-lg bg-gray text-white"><i class="fa fa-cog fa-lg"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="glyphicon glyphicon-user"></i> &nbsp; Mijn Profiel</a></li>
                        <li><a href="<?php echo site_url('Wachtwoord/verander'); ?>"><i class="glyphicon glyphicon-lock"></i> &nbsp; Wachtwoord wijzigen</a></li>
                        <li><a href="<?php echo site_url('Wachtwoord/veranderWifi'); ?>"><i class="glyphicon glyphicon-signal"></i> &nbsp; Wifi wachtwoor wijzigen</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('logout'); ?>"><i class="fa fa-sign-out"></i> &nbsp; Afmelden</a></li>
                    </ul>
                </li>
            </ul>
            <!-- xs & sm screen logo -->
            <a class="navbar-brand visible-xs" href="../index.html">
                <i class="fa fa-circle text-gray mr-n-sm"></i>
                <i class="fa fa-circle text-warning"></i>
                &nbsp;
                Hotspot
                &nbsp;
                <i class="fa fa-circle text-warning mr-n-sm"></i>
                <i class="fa fa-circle text-gray"></i>
            </a>
        </div>

        <!-- this part is hidden for xs screens -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#">
                        <strong><?= $_SESSION['name']; ?></strong>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-cog fa-lg"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="glyphicon glyphicon-user"></i> &nbsp; Mijn Profiel</a></li>
                        <li><a href="<?php echo site_url('Wachtwoord/verander'); ?>"><i class="glyphicon glyphicon-lock"></i> &nbsp; Wachtwoord wijzigen</a></li>
                        <li><a href="<?php echo site_url('Wachtwoord/veranderWifi'); ?>"><i class="glyphicon glyphicon-signal"></i> &nbsp; Wifi wachtwoor wijzigen</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('logout'); ?>"><i class="fa fa-sign-out"></i> &nbsp; Afmelden</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>