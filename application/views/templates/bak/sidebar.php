<?php

defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="sidebar-nav">
    <nav class="navbar navbar-dark bg-primary fixed-top ">
        <div class="container">

            <div class="offcanvas offcanvas-start shadow" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-body bg-primary bg-opacity-75">
                    <ul class="navbar-nav ">
                        <li class="nav-item mt-5">
                            <a href="<?= base_url() ?>" class="sidebar-item nav-link rounded-pill d-flex justify-content-center" onclick="toggleActive(this) ">
                                <span class="material-symbols-outlined me-2">
                                    dashboard
                                </span>
                                <span class="fw-semibold item-text fs-6">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item mt-2">
                            <a class="sidebar-item nav-link rounded-pill d-flex justify-content-center" onclick="toggleActive(this)" data-bs-toggle="collapse" href="#listAquarium" role="button" aria-expanded="false" aria-controls="listAquarium">
                                <span class="material-symbols-outlined me-2">
                                    database
                                </span>
                                <span class="item-text fs-6">Log Data</span>
                                <span class="material-symbols-outlined">
                                    expand_more
                                </span>
                            </a>
                        </li>
                        <div class="collapse " id="listAquarium">
                            <div class="card card-body border-0 bg-transparent ">
                                <ul class="text-secondary text-white">
                                    <?php
                                    foreach ($sensor as $data) {
                                    ?>
                                        <li>
                                            <a href="<?= base_url('detail/') ?><?= $data->id ?>" class="list-aquarium text-decoration-none fs-6 rounded-pill"><?= $data->nama ?></a>
                                        </li>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>