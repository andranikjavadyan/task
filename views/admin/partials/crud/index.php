<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Tasks</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                                   aria-describedby="example1_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending" style="width: 256.2px;">
                                        Id
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending"
                                        style="width: 227.4px;">Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending"
                                        style="width: 169.8px;">Email
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending"
                                        style="width: 120.4px;">Task
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending"
                                        style="width: 120.4px;">Date
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending"
                                        style="width: 250px;">Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($child_data as $key => $task):?>
                                    <tr role="row" class="<?=$key % 2 ? 'odd' : 'even'?>">
                                        <td><?=$task['id']?></td>
                                        <td><?=htmlspecialchars($task['name'])?></td>
                                        <td><?=htmlspecialchars($task['email'])?></td>
                                        <td><?=htmlspecialchars($task['task'])?></td>
                                        <td><?=$task['created_at']?></td>
                                        <td>
                                            <a class="btn btn-success btn-xs" href="/task/admin/task/update/<?=$task['id']?>"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-danger btn-xs" href="/task/admin/task/destroy/<?= $task['id']?>"><i class="fa fa-trash"></i></a>

                                            <?php if(isset($_SESSION['user']) && !$task['done']):?>
                                                <a title="Mark done" class="btn btn-success btn-xs" href="/task/admin/task/done/<?=$task['id']?>">Mark Complete</a>
                                            <?php elseif (isset($_SESSION['user']) && $task['done']):?>
                                                <a title="Mark incomplete" class="btn btn-warning btn-xs" href="/task/admin/task/incomplete/<?=$task['id']?>">Mark Incomplete</a>
                                            <?php else:?>
                                                <a class="btn btn-default btn-xs disabled"><?= $task['done'] ? 'Done' : 'Incomplete' ?></a>
                                            <?php endif;?>


                                        </td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
