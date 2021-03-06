<!-- SuperAdmin Sidebar -->

<li class="nav-item <?php echo $this->uri->segment(2) == 'proyek' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url() ?>admin/proyek">
        <i class="fas fa-fw fa-tasks"></i>
        <span>Kelola Konten Blog Post</span></a>
</li>

<li class="nav-item <?php echo $this->uri->segment(2) == 'proyek' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url() ?>admin/proyek">
        <i class="fas fa-fw fa-tasks"></i>
        <span>Kelola Konten Proyek</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item <?php echo $this->uri->segment(2) == 'team' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url() ?>admin/team">
        <i class="fas fa-fw fa-users"></i>
        <span>Kelola Konten Team</span></a>
</li>

<!-- Nav Item - Client -->
<li class="nav-item <?php echo $this->uri->segment(2) == 'client' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url() ?>admin/client">
        <i class="fas fa-fw fa-handshake"></i>
        <span>Kelola Konten Client</span></a>
</li>

<li class="nav-item <?php echo $this->uri->segment(2) == 'contact' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url() ?>admin/contact">
        <i class="fas fa-fw fa-address-book"></i>
        <span>Kelola Konten Contact Us</span></a>
</li>

<div class="sidebar-heading">
    Kelola Konten Sistem
</div>

<!-- Nav Item - Users -->
<li class="nav-item <?php echo $this->uri->segment(2) == 'users' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url() ?>admin/users">
        <i class="fas fa-fw fa-users"></i>
        <span>Kelola User</span></a>
</li>

<li class="nav-item <?php echo $this->uri->segment(2) == 'settings' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url() ?>admin/settings">
        <i class="fas fa-fw fa-cog"></i>
        <span>Pengaturan</span></a>
</li>