<li class="nav-item <?php echo $this->uri->segment(2) == 'footer' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url() ?>admin/footer">
        <i class="fas fa-fw fa-edit"></i>
        <span>Kelola Header & Footer</span></a>
</li>

<li class="nav-item <?php echo $this->uri->segment(2) == 'banner' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url() ?>admin/banner">
        <i class="fas fa-fw fa-edit"></i>
        <span>Kelola Banner</span></a>
</li>

<li class="nav-item <?php echo $this->uri->segment(2) == 'proyek' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url() ?>admin/proyek">
        <i class="fas fa-fw fa-edit"></i>
        <span>Kelola Proyek</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item <?php echo $this->uri->segment(2) == 'team' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url() ?>admin/team">
        <i class="fas fa-fw fa-edit"></i>
        <span>Kelola Team</span></a>
</li>

<!-- Nav Item - Client -->
<li class="nav-item <?php echo $this->uri->segment(2) == 'client' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url() ?>admin/client">
        <i class="fas fa-fw fa-edit"></i>
        <span>Kelola Client</span></a>
</li>

<li class="nav-item <?php echo $this->uri->segment(2) == 'contact_us' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url() ?>admin/contact_us">
        <i class="fas fa-fw fa-edit"></i>
        <span>Kelola Contact Us</span></a>
</li>

<!-- <div class="sidebar-heading">
    Manajemen User
</div> -->

<!-- Nav Item - Users -->
<!-- <li class="nav-item <?php echo $this->uri->segment(2) == 'users' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url() ?>admin/users">
        <i class="fas fa-fw fa-users"></i>
        <span>Kelola Pengguna</span></a>
</li> -->