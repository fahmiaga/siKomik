<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="shadow p-3 mb-3 bg-white rounded">
        <h3 class="mt-4">Data Komik <?= session()->get('username'); ?></h3>
    </div>
    <a href="/komik/create/" class="btn btn-primary mb-3">Tambah Data Komik</a>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <?= session()->getFlashdata('pesan'); ?>
    <?php endif; ?>
    <table class="table ">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Sampul</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($komik as $kom) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $kom['judul']; ?></td>
                    <td><img src="/img/<?= $kom['sampul']; ?>" alt="" width="75px"></td>
                    <td>
                        <a href="/komik/detail/<?= $kom['slug']; ?>" class="btn btn-info">Info</a>
                        <a href="/komik/ubah/<?= $kom['slug']; ?>" class="btn btn-warning">Edit</a>
                        <form action="/komik/hapus/<?= $kom['id_komik']; ?>" method="POST" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
<?= $this->endSection(); ?>