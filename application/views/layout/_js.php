<!-- Required vendors -->
<script src="<?= base_url('assets/focus-2/') ?>./vendor/global/global.min.js"></script>
<script src="<?= base_url('assets/focus-2/') ?>./js/quixnav-init.js"></script>
<script src="<?= base_url('assets/focus-2/') ?>./js/custom.min.js"></script>


<!-- Vectormap -->
<script src="<?= base_url('assets/focus-2/') ?>./vendor/raphael/raphael.min.js"></script>
<script src="<?= base_url('assets/focus-2/') ?>./vendor/morris/morris.min.js"></script>


<script src="<?= base_url('assets/focus-2/') ?>./vendor/circle-progress/circle-progress.min.js"></script>
<script src="<?= base_url('assets/focus-2/') ?>./vendor/chart.js/Chart.bundle.min.js"></script>

<script src="<?= base_url('assets/focus-2/') ?>./vendor/gaugeJS/dist/gauge.min.js"></script>

<!--  flot-chart js -->
<script src="<?= base_url('assets/focus-2/') ?>./vendor/flot/jquery.flot.js"></script>
<script src="<?= base_url('assets/focus-2/') ?>./vendor/flot/jquery.flot.resize.js"></script>

<!-- Owl Carousel -->
<script src="<?= base_url('assets/focus-2/') ?>./vendor/owl-carousel/js/owl.carousel.min.js"></script>

<!-- Counter Up -->
<script src="<?= base_url('assets/focus-2/') ?>./vendor/jqvmap/js/jquery.vmap.min.js"></script>
<script src="<?= base_url('assets/focus-2/') ?>./vendor/jqvmap/js/jquery.vmap.usa.js"></script>
<script src="<?= base_url('assets/focus-2/') ?>./vendor/jquery.counterup/jquery.counterup.min.js"></script>


<script src="<?= base_url('assets/focus-2/') ?>./js/dashboard/dashboard-1.js"></script>
<script src="<?= base_url('assets/focus-2/') ?>./vendor/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="<?= base_url('assets/focus-2/') ?>./js/plugins-init/sweetalert.init.js"></script>
<script>
   document.getElementById('openModal').addEventListener('click', function() {
       document.getElementById('myModal').style.display = 'block';
   });
   
   document.getElementsByClassName('close')[0].addEventListener('click', function() {
       document.getElementById('myModal').style.display = 'none';
   });
</script>


<script>
    $('#menghilang').delay('slow').slideDown('slow').delay(10000).slideUp(600);
</script>

<script>
document.getElementById("logoutButton").addEventListener("click", function(e) {
    e.preventDefault(); // Mencegah tindakan default dari tautan

    if (confirm("Apakah Anda yakin ingin logout?")) {
        // Jika pengguna menekan "Ya", maka lanjutkan dengan logout
        window.location.href = "<?php echo site_url('auth/logout'); ?>";
    }
});
</script>
