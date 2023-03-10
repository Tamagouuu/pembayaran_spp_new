</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php require_once PARTIAL_PATH . '/copyright.php' ?>
</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php require_once PARTIAL_PATH . '/logout-modal.php' ?>

<!-- Bootstrap core JavaScript-->
<script src="<?= BASEURL ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= BASEURL ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= BASEURL ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= BASEURL ?>/js/sb-admin-2.min.js"></script>

<?php if (isset($data['datatable'])) : ?>
    <script src="<?= BASEURL ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= BASEURL ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= BASEURL ?>/js/demo/datatables-demo.js"></script>
<?php endif; ?>

</body>

</html>