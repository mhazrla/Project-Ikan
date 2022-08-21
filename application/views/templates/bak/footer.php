<?php

defined('BASEPATH') or exit('No direct script access allowed');
?>
<footer class="bg-light text-center text-lg-start mt-auto">
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: #2083F4; color: #fff;">
        © 2022 Copyright || Created by Project Mahasiswa || SV IPB
    </div>
    <!-- Copyright -->
</footer>


</body>

<script>
    const navbar = document.querySelector('.col-navbar')
    const cover = document.querySelector('.screen-cover')

    const sidebar_items = document.querySelectorAll('.sidebar-item')

    function toggleNavbar() {
        navbar.classList.toggle('d-none')
        cover.classList.toggle('d-none')
    }

    function toggleActive(e) {
        sidebar_items.forEach(function(v, k) {
            v.classList.remove('active')
        })
        e.closest('.sidebar-item').classList.add('active')

    }
    $(document).ready(function() {
        $('table').DataTable();
        setInterval(function() {
            $('.data').load("<?= base_url('MonitoringController/sensorVal') ?>");
        }, 500);

    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</html>