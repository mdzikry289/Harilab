<!-- SuperAdmin Sidebar -->

<!-- Nav Item - Intro -->
<li class="nav-item <?php echo $this->uri->segment(2) == 'blog' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url() ?>/admin/blog">
        <i class="fas fa-fw fa-users"></i>
        <span>Konten Intro</span></a>
</li>

<!-- Nav Item - Blog -->
<li class="nav-item <?php echo $this->uri->segment(2) == 'blog' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url() ?>/admin/blog">
        <i class="fas fa-fw fa-users"></i>
        <span>Konten Blog</span></a>
</li>

<li class="nav-item <?php echo $this->uri->segment(2) == 'proyek' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url() ?>/admin/proyek">
        <i class="fas fa-fw fa-edit"></i>
        <span>Konten Proyek</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item <?php echo $this->uri->segment(2) == 'team' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url() ?>/admin/team">
        <i class="fas fa-fw fa-edit"></i>
        <span>Konten Team</span></a>
</li>

<!-- Nav Item - Client -->
<li class="nav-item <?php echo $this->uri->segment(2) == 'client' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url() ?>/admin/client">
        <i class="fas fa-fw fa-edit"></i>
        <span>Konten Client</span></a>
</li>

<!-- Nav Item - Services -->
<li class="nav-item <?php echo $this->uri->segment(2) == 'services' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url() ?>/admin/services">
        <i class="fas fa-fw fa-edit"></i>
        <span>Konten Our Services</span></a>
</li>

<div class="sidebar-heading">
    Manajemen User
</div>

<!-- Nav Item - Users -->
<li class="nav-item <?php echo $this->uri->segment(2) == 'users' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url() ?>/admin/users">
        <i class="fas fa-fw fa-users"></i>
        <span>Kelola Pengguna</span></a>
</li>