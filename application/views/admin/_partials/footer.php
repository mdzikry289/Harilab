<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <?php foreach ($settings as $s) : ?>
            <span>&copy;<?= $s->footer; ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</footer>