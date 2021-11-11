<?php include_once('header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <?php include_once('message.php'); ?>
        <table class="table table-hover table-bordered" id="sampleTable">
          <thead>
            <tr>
              <th>Sr No.</th>
              <th>Title</th>
              <th>Category</th>
              <th>Main Photo 1</th>
              <th>Dashboard Status</th>
              <th>Visibility Status</th>
              <th>Created Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $c = 0;
            foreach ($pageData as $key => $value) : ?>
              <tr>
                <td><?= ++$c ?></td>
                <td><?= $value['title']; ?></td>
                <td><?= ucfirst($value['name']); ?></td>
                <td><img src=" <?= public_front_end_path('/upload/projects/' . $value['main_image_1']); ?>" alt="<?= $value['main_image_1'] ?>" class="img-thumbnail " width="100" /></td>
                <td><?= ($value['dashboard_status'] == 1) ? 'Yes' : 'No'; ?></td>
                <td><?= ($value['visibile_status'] == 1) ? 'Active' : 'Inactive'; ?></td>
                <td><?= $value['created_at']; ?></td>
                <td>
                  <a href="<?= base_url('showproject/' . $value['id']); ?>" class="btn btn-success" onclick="return confirm('Are you sure you want to view <?= $value['title']; ?> project ?');" title="View Project"><i class="fa fa-eye fa-lg"></i></a>

                  <?php if ($value['dashboard_status'] == 0) : ?>
                    <a href="<?= base_url('dashboard_status/1/' . $value['id']) ?>" class="btn btn-info" onclick="return confirm('Are you sure you want to Active <?= $value['title']; ?> Dashboard Image ?');" title="Active Dashboard Image"><i class="fa fa-check fa-lg"></i> </a>
                  <?php else : ?>
                    <a href="<?= base_url('dashboard_status/0/' . $value['id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to Inactive <?= $value['title']; ?> Dashboard Image ?');" title="Inavtive Dashboard Image"><i class="fa fa-times fa-lg"></i></a>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include_once('footer.php') ?>
<?php include_once('data_tables_footer.php'); ?>
<?php include_once('close_html_footer.php'); ?>