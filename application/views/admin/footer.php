<footer class="container d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0">&copy; 2021 SMAN 1 Jorong, Edu</p>
</footer>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/DataTables/datatables.min.js"></script>
<script src="<?= base_url(); ?>assets/sweatalert2/dist/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/select2/dist/js/select2.min.js"></script>
<script type="text/javascript">
    const baseURL = "<?php echo base_url(); ?>";
</script>
<script src="<?= base_url(); ?>assets/my-script.js"></script>

<?php if ($this->session->flashdata('tipe')) : ?>
    <script>
        Swal.fire(
            '<?= $this->session->flashdata('pesan'); ?>',
            '',
            '<?= $this->session->flashdata('tipe'); ?>',
        )
    </script>
<?php endif; ?>

</body>

</html>