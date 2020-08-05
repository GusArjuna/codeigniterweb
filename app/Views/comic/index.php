<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmodal">
                Add Comic!
            </button>
            <h3 class="mt-2">List Comics</h3>
            <?php if (session()->getFlashData('message')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('message'); ?>
                </div>
            <?php endif; ?>
            <?php if ($validation) : ?>
                <?= $validation->listErrors(); ?>
            <?php endif; ?>
            <div class="comics-table">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pic</th>
                            <th scope="col">Title</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($comics as $comic) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><img src="/img/<?= $comic['cover']; ?>" alt="" width="70"></td>
                                <td><?= $comic['title']; ?></td>
                                <td>
                                    <a href="/comics/<?= $comic['slug']; ?>" class="btn btn-info">Detail</a>
                                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#addmodal">Edit</a>
                                    <a href="" class="btn btn-danger" onclick="return confirm('You want to delete This Data?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titlemodal">Add Comic</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/comics/save" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="titlecomic">Title : </label>
                        <input type="text" class="form-control" id="titlecomic" name="titlecomic">
                    </div>
                    <div class="form-group">
                        <label for="creatorcomic">Creator : </label>
                        <input type="text" class="form-control" id="creatorcomic" name="creatorcomic">
                    </div>
                    <div class="form-group">
                        <label for="publishercomic">Publisher : </label>
                        <input type="text" class="form-control" id="publishercomic" name="publishercomic">
                    </div>
                    <div class="form-group">
                        <label for="covercomic">Cover : </label>
                        <input type="file" class="form-control-file" id="covercomic" name="covercomic">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>