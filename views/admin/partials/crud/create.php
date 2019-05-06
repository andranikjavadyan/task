<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><?= isset($child_datas['id']) ? 'Update Task' : 'Create Task' ?></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form role="form" action="<?= isset($child_datas) ? '/task/admin/task/edit/' . $child_datas['id'] : '/task/admin/task/add' ?>" method="post">
            <!-- text input -->
            <div class="form-group">
                <label>Name</label>
                <input required type="text" class="form-control" placeholder="Enter ..." name="name" value="<?=isset($child_datas['name']) ? $child_datas['name'] : ''?>">
            </div>
            <!-- textarea -->
            <div class="form-group">
                <label>Email</label>
                <input required type="email" class="form-control" placeholder="Enter email..." name="email" value="<?=isset($child_datas['email']) ? $child_datas['email'] : ''?>">
            </div>
            <!-- textarea -->
            <div class="form-group">
                <label>Textarea</label>
                <textarea required class="form-control" rows="3" placeholder="Enter task..." name="task"><?=isset($child_datas['task']) ? $child_datas['task'] : ''?></textarea>
            </div>
            <button class="btn btn-primary">Save</button>
        </form>
    </div>
    <!-- /.card-body -->
</div>
