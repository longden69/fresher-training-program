<div class="row content">
    <h1>This is Content</h1>
    <table class="table table-bordered table-bordered">
        <tr>
            <th>ID</th>
            <th>Article Name</th>
            <th>Description</th>
            <td>Status</td>
        </tr>
        <?php foreach ($data as $key1 => $val1) { ?>
            <tr>
                <td><?=$val1['id']?></td>
                <td><?=$val1['article_name']?></td>
                <td><?=$val1['description']?></td>
                <td><?=$val1['status']?></td>
            </tr>

        <?php } ?>
    </table>
</div>