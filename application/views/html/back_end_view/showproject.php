<?php include_once('header.php'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <table class="table table-hover table-bordered">
                    <tr>
                        <td colspan="2"><a href="<?= base_url('editproject/' . $pageData['id']); ?>" class="btn btn-success" onclick="return confirm('Are you sure you want to view <?= $pageData['title']; ?> project ?');" title="View Project"><i class="fa fa-check fa-lg"></i> Edit</a>

                            <a href="<?= base_url('deleteproject/' . $pageData['id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to Delete <?= $pageData['title']; ?> project ?');" title="View Project"><i class="fa fa-trash fa-lg"></i> Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td><strong><?= $pageData['title']; ?></strong></td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td><strong><?= ucfirst($pageData['name']); ?></strong></td>
                    </tr>
                    <tr>
                        <td>Main image 1</td>
                        <td><img src=" <?= public_front_end_path('/upload/projects/' . $pageData['main_image_1']); ?>" alt="<?= $pageData['main_image_1'] ?>" class="img-thumbnail " width="100" /></td>
                    </tr>
                    <tr>
                        <td>Main image 2</td>
                        <td><img src=" <?= public_front_end_path('/upload/projects/' . $pageData['main_image_2']); ?>" alt="<?= $pageData['main_image_2'] ?>" class="img-thumbnail " width="100" /></td>
                    </tr>
                    <tr>
                        <td>Slide Show Images</td>
                        <td>
                            <?php
                            $arrayImages = explode(',', $pageData['slide_show_images']);

                            foreach ($arrayImages as $key => $value) :
                            ?>
                                <img src=" <?= public_front_end_path('/upload/projects/' . $value); ?>" alt="<?= $value ?>" class="img-thumbnail " width="100" />
                            <?php endforeach; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><strong> <?= nl2br($pageData['description']); ?></strong></td>
                    </tr>
                    <tr>
                        <td>Poject Completion Date</td>
                        <td><strong> <?= date('Y-m-d', strtotime($pageData['project_date'])); ?></strong></td>
                    </tr>
                    <tr>
                        <td>Dashboard status</td>
                        <td><strong> <?= ($pageData['dashboard_status'] == 1) ? 'Yes' : 'No'; ?></strong></td>
                    </tr>
                    <tr>
                        <td>Visibile status</td>
                        <td><strong> <?= ($pageData['visibile_status'] == 1) ? 'Active' : 'Inactive'; ?></strong></td>
                    </tr>
                    <tr>
                        <td>Added Date</td>
                        <td><strong> <?= $pageData['created_at'] ?></strong></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include_once('footer.php') ?>
<?php include_once('data_tables_footer.php'); ?>
<?php include_once('close_html_footer.php'); ?>