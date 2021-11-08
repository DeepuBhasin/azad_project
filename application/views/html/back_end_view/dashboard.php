<?php include_once('header.php'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card" style="overflow: auto;">
            <h3 class="card-title">All Mails</h3>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Email id</th>
                        <th>Phone Number</th>
                        <th>Message</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $c = 0;
                    foreach ($dashboardPageData as $key => $value) :
                    ?>
                        <tr>
                            <td><?= ++$c; ?></td>
                            <td><?= ucwords($value['user_name']); ?></td>
                            <td><?= $value['email']; ?></td>
                            <td><?= $value['phone']; ?></td>
                            <td><a class="btn btn-info btn-sm" data-toggle="modal" href='#modal-id' onclick="showMessage('<?= $value['message'] ?>')">Message</a> </td>
                            <td><?= $value['created_at']; ?></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">User Message</h4>
                </div>
                <div class="modal-body">
                    <p id="addMessga"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showMessage(message) {
            document.getElementById('addMessga').innerHTML = message;
        }
    </script>




    <?php include_once('footer.php'); ?>
    <?php include_once('close_html_footer.php') ?>